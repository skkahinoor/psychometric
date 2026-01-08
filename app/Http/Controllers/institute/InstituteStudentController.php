<?php

namespace App\Http\Controllers\institute;

use App\Http\Controllers\Controller;
use App\Models\CareerPath;
use App\Models\Institute;
use App\Models\Roll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstituteStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $useremail = Auth::user()->email;
        $getinstitute = Institute::where('email', $useremail)->first();
        $students = User::where('register_institute_id', $getinstitute->id)->paginate(10);

        return view('institutes.students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentInstituteId = Auth::id();
        return view('institutes.createstudent', compact('currentInstituteId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $useremail = Auth::user()->email;
        $getinstitute = Institute::where('email', $useremail)->first();
        $getrollid = Roll::where('slug', 'student')->first();

        $totalstudentlimit = $getinstitute->allowed_students;
        $registered = User::where('register_institute_id', $getinstitute->id)->count();
        if ($registered >= $totalstudentlimit) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Student limit has been reached. You cannot add more students.');
        }

        $request->validate([
            'register_institute_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'age' => ['required', 'integer', 'min:1'],
            'class' => ['required', 'string', 'max:255'],
            'school' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'subjects_stream' => ['required', 'string', 'max:255'],
            'career_aspiration' => ['nullable', 'string', 'max:255'],
            'parental_occupation' => ['nullable', 'string', 'max:255'],

        ]);

        User::create([
            'rolls_id' => $getrollid->id,
            'register_institute_id' => $getinstitute->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'), // Default password
            'age' => $request->age,
            'class' => $request->class,
            'school' => $request->school,
            'location' => $request->location,
            'subjects_stream' => $request->subjects_stream,
            'career_aspiration' => $request->career_aspiration,
            'parental_occupation' => $request->parental_occupation,
        ]);

        return redirect()->route('institutestudent.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $user = User::findOrFail($userId);

        // Build career paths mapping identical to student result logic
        $careerpaths = CareerPath::with(['sections', 'careers.careerCategory'])->get()->reduce(function ($carry, $path) {
            foreach ($path->sections as $section) {
                if (!isset($carry[$section->id])) {
                    $carry[$section->id] = collect();
                }
                if (!$carry[$section->id]->contains(fn($p) => $p->id === $path->id)) {
                    $carry[$section->id]->push($path);
                }
            }
            return $carry;
        }, []);

        $responses = DB::table('assessments')
            ->join('sections', 'assessments.section_id', '=', 'sections.id')
            ->join('domains', 'sections.domain_id', '=', 'domains.id')
            ->select(
                'assessments.section_id',
                'sections.image as section_image',
                'sections.name as section_name',
                'sections.description as section_description',
                'sections.keytraits as section_keytraits',
                'sections.enjoys as section_enjoys',
                'sections.idealenvironments as section_idealenvironments',
                'sections.domain_id',
                'domains.name as domain_name',
                'domains.display_name as domain_display_name',
                'domains.description as domain_description',
                DB::raw('SUM(response_value) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->where('assessments.student_id', $userId)
            ->groupBy('assessments.section_id', 'sections.name', 'sections.image', 'section_description', 'section_keytraits', 'section_enjoys', 'section_idealenvironments', 'sections.domain_id', 'domains.name', 'domains.display_name', 'domains.description')
            ->get();

        $flatResults = [];

        foreach ($responses as $response) {
            $flatResults[] = [
                'domain_name' => $response->domain_name,
                'domain_display_name' => $response->domain_display_name ?? $response->domain_name,
                'domain_description' => $response->domain_description,
                'domain_id' => $response->domain_id,
                'section_id' => $response->section_id,
                'section_name' => $response->section_name,
                'section_image' => $response->section_image,
                'section_description' => $response->section_description,
                'section_keytraits' => $response->section_keytraits,
                'section_enjoys' => $response->section_enjoys,
                'section_idealenvironments' => $response->section_idealenvironments,
                'average' => round($response->total / $response->count, 2),
                'relevant_description' => $response->section_description, // Adding relevant_description
            ];
        }

        $grouped = collect($flatResults)->groupBy('domain_name');
        // $groupedResults = $grouped->map(fn($sections) => $sections->sortByDesc('average')->take(3)->values());

        $groupedResults = $grouped->map(function ($sections) {
            $sorted = $sections->sortByDesc('average')->values();

            foreach ($sorted as $index => $section) {
                $label = $index === 0 ? 'Dominant Trait' : 'Supportive Trait';

                $section['average_value'] = $section['average']; // keep original number for chart
                // $section['section_name'] = $section['section_name'] . " - $label"; // labeled version for display
                $section['label'] = $label;
                $sorted[$index] = $section;
            }

            // For APTITUDE domain, return top 2 sections for cards, for others return top 3
            $domainName = $sections->first()['domain_name'] ?? '';
            if ($domainName === 'APTITUDE') {
                $cardsData = $sorted->take(2);
            } else {
                $cardsData = $sorted->take(3);
            }

            return [
                'cards' => $cardsData,
                'chart' => $sorted,
                'description' => $sections->first()['domain_description'] ?? ''
            ];
        });

        if ($user->is_submitted == 0) {
            return redirect()->route('institutestudent.index')->with('error', 'This student is not submitted the Assessment.');
        } elseif ($user->is_submitted == 1) {
            return view('student.assessment.result', compact('careerpaths'), [
                'groupedResults' => $groupedResults->toArray(),
                'viewerContext' => 'institute',
                'viewStudentId' => $userId,
            ]);
        }
    }

    public function report($userId)
    {
        $student = User::findOrFail($userId);

        // Reuse the same data building as student report
        $careerpaths = CareerPath::with(['sections', 'careers.careerCategory'])->get()->reduce(function ($carry, $path) {
            foreach ($path->sections as $section) {
                if (!isset($carry[$section->id])) {
                    $carry[$section->id] = collect();
                }
                if (!$carry[$section->id]->contains(fn($p) => $p->id === $path->id)) {
                    $carry[$section->id]->push($path);
                }
            }
            return $carry;
        }, []);

        $responses = DB::table('assessments')
            ->join('sections', 'assessments.section_id', '=', 'sections.id')
            ->join('domains', 'sections.domain_id', '=', 'domains.id')
            ->select(
                'assessments.section_id',
                'sections.image as section_image',
                'sections.name as section_name',
                'sections.description as section_description',
                'sections.keytraits as section_keytraits',
                'sections.enjoys as section_enjoys',
                'sections.idealenvironments as section_idealenvironments',
                'sections.domain_id',
                'domains.name as domain_name',
                'domains.display_name as domain_display_name',
                'domains.description as domain_description',
                DB::raw('SUM(response_value) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->where('assessments.student_id', $userId)
            ->groupBy('assessments.section_id', 'sections.name', 'sections.image', 'section_description', 'section_keytraits', 'section_enjoys', 'section_idealenvironments', 'sections.domain_id', 'domains.name', 'domains.display_name', 'domains.description')
            ->get();

        $flatResults = [];
        foreach ($responses as $response) {
            $flatResults[] = [
                'domain_name' => $response->domain_name,
                'domain_display_name' => $response->domain_display_name,
                'domain_description' => $response->domain_description,
                'domain_id' => $response->domain_id,
                'section_id' => $response->section_id,
                'section_image' => $response->section_image,
                'section_name' => $response->section_name,
                'section_description' => $response->section_description,
                'section_keytraits' => $response->section_keytraits,
                'section_enjoys' => $response->section_enjoys,
                'section_idealenvironments' => $response->section_idealenvironments,
                'low' => optional(\App\Models\Section::find($response->section_id))->low,
                'mid' => optional(\App\Models\Section::find($response->section_id))->mid,
                'high' => optional(\App\Models\Section::find($response->section_id))->high,
                'total' => $response->total,
                'average' => round($response->total / $response->count, 2),
            ];
        }

        $grouped = collect($flatResults)->groupBy('domain_name');
        $groupedResults = $grouped->map(function ($sections, $domainName) {
            $domainDescription = '';
            $domainWeightage = null;
            if ($sections->isNotEmpty()) {
                $firstSection = $sections->first();
                $domain = \App\Models\Domain::find($firstSection['domain_id']);
                if ($domain) {
                    $domainDescription = $domain->description;
                    $domainWeightage = $domain->domain_weightage;
                }
            }
            $sorted = $sections->sortByDesc('average')->values();
            if ($domainName === 'OCEAN') {
                foreach ($sorted as $index => $section) {
                    $average = $section['average'];
                    if ($average >= 1 && $average <= 2) {
                        $label = 'Low';
                        $relevantDescription = $section['low'];
                    } elseif ($average >= 2.1 && $average <= 3.9) {
                        $label = 'Mid';
                        $relevantDescription = $section['mid'];
                    } elseif ($average >= 4 && $average <= 5) {
                        $label = 'High';
                        $relevantDescription = $section['high'];
                    } else {
                        $label = 'Mid';
                        $relevantDescription = $section['mid'];
                    }
                    $section['average_value'] = $average;
                    $section['label'] = $label;
                    $section['relevant_description'] = $relevantDescription;
                    $sorted[$index] = $section;
                }
                return [
                    'cards' => $sorted,
                    'chart' => $sorted,
                    'description' => $domainDescription,
                    'domain_weightage' => $domainWeightage,
                ];
            } elseif ($domainName === 'WORK VALUES' && $sorted->count() >= 1) {
                $labels = ['High', 'Mid', 'Low'];
                $count = $sorted->count();
                for ($i = 0; $i < $count; $i++) {
                    $label = $labels[$i] ?? 'Low';
                    if ($count == 2) {
                        $label = $i == 0 ? 'High' : 'Low';
                    }
                    $section = $sorted[$i];
                    $section['average_value'] = $section['average'];
                    $section['label'] = $label;
                    $sorted[$i] = $section;
                }
                $allSectionsForChart = $sorted;
                $filteredForCards = $sorted->filter(function($section) {
                    return $section['label'] !== 'Low';
                })->values();
                return [
                    'cards' => $filteredForCards,
                    'chart' => $allSectionsForChart,
                    'description' => $domainDescription,
                    'domain_weightage' => $domainWeightage,
                ];
            } else {
                foreach ($sorted as $index => $section) {
                    if ($domainName === 'VARK') {
                        $label = $index === 0 ? 'Primary' : 'Secondary';
                    } else {
                        $label = $index === 0 ? 'Dominant Trait' : 'Supportive Trait';
                    }
                    if ($domainName === 'APTITUDE') {
                        $section['average_value'] = $section['total'];
                        $section['average'] = $section['total'];
                    } else {
                        $section['average_value'] = $section['average'];
                    }
                    $section['label'] = $label;
                    $sorted[$index] = $section;
                }
                if ($domainName === 'APTITUDE') {
                    $cardsData = $sorted->take(2);
                } else {
                    $cardsData = $sorted->take(3);
                }
                return [
                    'cards' => $cardsData,
                    'chart' => $sorted,
                    'description' => $domainDescription,
                    'domain_weightage' => $domainWeightage,
                ];
            }
        });

        $data = [
            'student' => $student,
            'careerpaths' => $careerpaths,
            'groupedResults' => $groupedResults->toArray(),
        ];

        return view('student.assessment.report', $data);
    }

    public function reportPdf($userId)
    {
        $student = User::findOrFail($userId);

        // Build same data as report()
        $careerpaths = CareerPath::with(['sections', 'careers.careerCategory'])->get()->reduce(function ($carry, $path) {
            foreach ($path->sections as $section) {
                if (!isset($carry[$section->id])) {
                    $carry[$section->id] = collect();
                }
                if (!$carry[$section->id]->contains(fn($p) => $p->id === $path->id)) {
                    $carry[$section->id]->push($path);
                }
            }
            return $carry;
        }, []);

        $responses = DB::table('assessments')
            ->join('sections', 'assessments.section_id', '=', 'sections.id')
            ->join('domains', 'sections.domain_id', '=', 'domains.id')
            ->select(
                'assessments.section_id',
                'sections.image as section_image',
                'sections.name as section_name',
                'sections.description as section_description',
                'sections.keytraits as section_keytraits',
                'sections.enjoys as section_enjoys',
                'sections.idealenvironments as section_idealenvironments',
                'sections.domain_id',
                'domains.name as domain_name',
                'domains.display_name as domain_display_name',
                'domains.description as domain_description',
                DB::raw('SUM(response_value) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->where('assessments.student_id', $userId)
            ->groupBy('assessments.section_id', 'sections.name', 'sections.image', 'section_description', 'section_keytraits', 'section_enjoys', 'section_idealenvironments', 'sections.domain_id', 'domains.name', 'domains.display_name', 'domains.description')
            ->get();

        $flatResults = [];
        foreach ($responses as $response) {
            $flatResults[] = [
                'domain_name' => $response->domain_name,
                'domain_display_name' => $response->domain_display_name,
                'domain_description' => $response->domain_description,
                'domain_id' => $response->domain_id,
                'section_id' => $response->section_id,
                'section_image' => $response->section_image,
                'section_name' => $response->section_name,
                'section_description' => $response->section_description,
                'section_keytraits' => $response->section_keytraits,
                'section_enjoys' => $response->section_enjoys,
                'section_idealenvironments' => $response->section_idealenvironments,
                'low' => optional(\App\Models\Section::find($response->section_id))->low,
                'mid' => optional(\App\Models\Section::find($response->section_id))->mid,
                'high' => optional(\App\Models\Section::find($response->section_id))->high,
                'total' => $response->total,
                'average' => round($response->total / $response->count, 2),
            ];
        }

        $grouped = collect($flatResults)->groupBy('domain_name');
        $groupedResults = $grouped->map(function ($sections, $domainName) {
            $domainDescription = '';
            if ($sections->isNotEmpty()) {
                $firstSection = $sections->first();
                $domain = \App\Models\Domain::find($firstSection['domain_id']);
                $domainDescription = $domain ? $domain->description : '';
            }
            $sorted = $sections->sortByDesc('average')->values();
            foreach ($sorted as $index => $section) {
                if ($domainName === 'APTITUDE') {
                    $section['average_value'] = $section['total'];
                    $section['average'] = $section['total'];
                } else {
                    $section['average_value'] = $section['average'];
                }
                $sorted[$index] = $section;
            }
            if ($domainName === 'APTITUDE') {
                $cardsData = $sorted->take(2);
            } else {
                $cardsData = $sorted->take(3);
            }
            return [
                'cards' => $cardsData,
                'chart' => $sorted,
                'description' => $domainDescription,
            ];
        });

        $data = [
            'student' => $student,
            'careerpaths' => $careerpaths,
            'groupedResults' => $groupedResults->toArray(),
        ];

        $html = view('student.assessment.report-pdf', $data)->render();
        $dompdfOptions = new \Dompdf\Options();
        $dompdfOptions->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($dompdfOptions);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();

        return response($output, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="assessment-report.pdf"');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
