<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assessment Report</title>
    <style>
        * {
            margin: 0;
            /* padding: 0; */
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
        }

        /* h1 {
            
            font-size: 22px;
            margin-bottom: 10px;
        } */

        h2 {
            color: #111827;
            font-size: 18px;
            margin: 16px 0 8px;
        }

        /* Section title banner – updated to match red theme */
        .h2-banner {
            background: #b91c1c;
            color: #ffffff;
            padding: 12px 16px;
            margin: 16px 0 8px 0;
            position: relative;
            overflow: hidden;
        }

        .h2-banner .h2-title {
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0;
            position: relative;
            z-index: 2;
            color: #ffffff;
        }

        .h2-banner::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: #f97316;
            z-index: 1;
        }

        h3 {
            font-size: 14px;
            margin: 8px 0 4px;
        }

        .section {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 8px;
        }

        .meta {
            font-size: 12px;
            color: #374151;
        }

        .row {
            display: flex;
            gap: 10px;
        }

        .col {
            flex: 1;
        }

        .badge {
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 4px;
            padding: 2px 6px;
            font-size: 11px;
            display: inline-block;
            margin: 2px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #e5e7eb;
            padding: 6px;
            font-size: 12px;
        }

        /* Static bar chart styles for PDF */
        .barRow {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 6px 0;
        }

        .barLabel {
            width: 35%;
            font-size: 12px;
            color: #374151;
        }

        .barTrack {
            flex: 1;
            height: 10px;
            background: #e5e7eb;
            border-radius: 6px;
            overflow: hidden;
        }

        .barFill {
            height: 100%;
            background: #6366f1;
        }

        /* Header styles (updated to new theme) */
        .top-header {
            background: #ffffff;
            color: #b91c1c;
        }

        .top-header-h1 {
            background: #ffffff;
            color: #b91c1c;
        }

        .top-header .container {
            padding-top: 16px;
            padding-bottom: 16px;
            text-align: center;
        }

        .top-header-h1 .container-h1 {
            padding-top: 16px;
            padding-bottom: 16px;
            /* text-align: center; */
        }

        .top-header .title {
            font-size: 28px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .top-header .subtitle {
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 4px;
            opacity: 0.95;
        }

        .top-header-h1 .title-h1 {
            font-size: 24px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            left: 10px;
            padding-left: 5px;
        }

        .top-header-h1 .subtitle-h1 {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 4px;
            opacity: 0.95;
            left: 10px;
            padding-left: 5px;
        }

        .stripe {
            height: 16px;
            width: 100%;
        }

        .stripe-1 {
            background: #f97316;
        }

        .stripe-2 {
            background: #facc15;
        }

        /* New cover-page layout (no background image) */
        .cover-inner {
            height: 100%;
            padding: 64px 72px 64px 72px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .cover-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .cover-logo {
            text-align: right;
            font-size: 12px;
        }

        .cover-logo img {
            height: 32px;
            margin-bottom: 4px;
        }

        .cover-title-block {
            margin-top: 80px;
            text-align: center;
        }

        .cover-main-title {
            font-size: 26px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #b91c1c;
            line-height: 1.3;
        }

        .cover-subtitle {
            margin-top: 8px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            color: #b91c1c;
        }

        .cover-tagline {
            margin-top: 18px;
            font-size: 12px;
            color: #4b5563;
        }

        .cover-student-box {
            align-self: flex-start;
            margin-top: 40px;
            border: 1px solid #e5e7eb;
            padding: 10px 14px;
            border-radius: 4px;
            font-size: 11px;
            background: #ffffff;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.08);
        }

        .cover-student-title {
            display: inline-block;
            font-weight: 700;
            font-size: 11px;
            padding: 3px 8px;
            margin-bottom: 6px;
            background: #111827;
            color: #ffffff;
        }

        /* Page margins (leave space for header + footer on inner pages) */
        @page {
            margin: 80px 32px 90px 32px;
        }

        /* Fixed header that repeats on every non-cover page */
        .pdf-header {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            height: 60px;
            z-index: 900;
        }

        .pdf-header-inner {
            height: 60px;
            padding: 10px 32px;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
            color: #374151;
        }

        .pdf-header-left {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
        }

        .pdf-header-left img {
            height: 26px;
        }

        .pdf-header-right {
            font-weight: 600;
        }

        /* Repeating footer for every PDF page */
        .pdf-footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            height: 60px;
            z-index: 1000;
        }

        /* Top twin stripes, like the sample */
        .pdf-footer .footer-top-stripe-1 {
            height: 2px;
            background: #d64b4b;
            width: 100%;
        }

        .pdf-footer .footer-top-stripe-2 {
            height: 2px;
            background: #f59e0b;
            width: 100%;
        }

        /* Main footer body */
        .pdf-footer .footer-inner {
            background: #ffffff;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            padding: 8px 16px;
        }

        .pdf-footer .footer-left,
        .pdf-footer .footer-center,
        .pdf-footer .footer-right {
            font-size: 10px;
            color: #4b5563;
        }

        .pdf-footer .footer-center {
            text-align: center;
            flex: 1;
        }

        .pdf-footer .footer-right {
            text-align: right;
            min-width: 80px;
        }

        /* Ensure the first section renders as a standalone cover page */
        .cover-page {
            position: relative;
            height: 100vh;
            /* full page height */
            page-break-after: always;
        }

        /* Place the header over the full-page image */
        .cover-page .top-header {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 4;
        }

        .body-space {
            padding: 10px;
        }

        .domain-section {
            min-height: calc(100vh - 100px);
            page-break-after: always;
            page-break-inside: avoid;
        }

        .careerpath-section {
            min-height: 60vh;
            page-break-before: always;
        }

        .careerpath-chart {
            min-height: 20vh;
            page-break-before: always;
            page-break-after: always;
        }

        ol,
        ul,
        menu {
            list-style: disc !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Add comfortable padding for the bullet list below the header */
        ul.meta {
            padding-left: 30px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
        }

        p.meta {
            padding: 30px !important;
        }

        .careerdesc {
            padding: 30px !important;
        }

        .section-contaner {
            padding: 25px !important;
        }

        .career-table {
            padding: 25px !important;
        }

        .career-chart {
            padding: 25px !important;
        }

        image.meta {
            height: 100px !important;
            width: 250px !important;
        }

        /* Cover page illustration */
        .cover-illustration {
            position: absolute;
            right: 60px;
            bottom: 120px;
            width: 260px;
            opacity: 0.95;
            z-index: 1;
        }

        /* Make sure content stays above image */
        .cover-title-block,
        .cover-student-box,
        .cover-logo {
            position: relative;
            z-index: 2;
        }
    </style>
    @php use Illuminate\Support\Str; @endphp
    @php $student = $student ?? auth()->user(); @endphp
</head>

<body>
    <div class="cover-page">
        <div class="cover-inner">
            <img src="{{ asset('images/cover-illustration.png') }}" class="cover-illustration"
                alt="Psychometric Assessment Illustration">
            <div class="cover-top">
                <div></div>
                <div class="cover-logo">
                    <img src="{{ asset('images/footerlogo.png') }}" alt="Career Map logo">
                    <div>CAREER MAP</div>
                </div>
            </div>

            <div class="cover-title-block">
                <div class="cover-main-title">
                    COMPREHENSIVE<br>
                    PSYCHOMETRIC<br>
                    ASSESSMENT REPORT
                </div>
                <div class="cover-tagline">
                    Discover Your True Strengths and Potential.
                </div>
            </div>

            <div class="cover-student-box">
                <div class="cover-student-title">Student Information</div>
                <div>Name: {{ $student->name }}</div>
                <div>Class: {{ $student->class ?? '-' }}</div>
                <div>School Name: {{ optional($student)->school_name ?? '-' }}</div>
                <div>Date: {{ date('d M Y') }}</div>
                <div>Email Id: {{ $student->email ?? '-' }}</div>
                <div>Phone No: {{ optional($student)->phone ?? '-' }}</div>
            </div>
        </div>
    </div>

    {{-- Fixed header for inner pages (starts after cover because of page-break on cover-page) --}}
    <div class="pdf-header">
        <div class="pdf-header-inner">
            <div class="pdf-header-left">
                <img src="{{ asset('images/footerlogo.png') }}" alt="Career Map logo">
                <span>Career Map – Comprehensive Psychometric Assessment Report</span>
            </div>
            <div class="pdf-header-right">
                {{ $student->name }}
            </div>
        </div>
    </div>

    <div>
        <div>
            <div class="top-header-h1">
                <div class="container-h1">
                    <div class="title-h1">Introduction</div>
                </div>
                <div class="stripe stripe-1"></div>
                <div class="stripe stripe-2"></div>
            </div>

            <div class="meta">
                <p class="meta">The report presented by Career Map outlines key observations about
                    {{ $student->name }}'s personality profile, career interests, work preferences, cognitive
                    strengths,
                    and future career orientation. These outcomes are indicative, not definitive, and must be reviewed
                    again in subsequent counselling meetings. Recommendations may shift based on deeper interaction and
                    continuous assessment.</p>
            </div>

            <div class="meta">
                <div class="h2-banner">
                    <h2 class="h2-title">Tools Used in This Report</h2>
                </div>
                <ul class="meta">
                    <li><strong>Holland Code (RIASEC):</strong> Interest areas and vocational fit.</li>
                    <li><strong>NEO FFI (Big Five):</strong> Personality traits across five core dimensions.</li>
                    <li><strong>VARK:</strong> Preferred learning style and study strategies.</li>
                    <li><strong>Work Values Inventory:</strong> Motivational drivers in work environments.</li>
                    <li><strong>Goal Orientation:</strong> Short-term versus long-term focus and planning.</li>
                    <li><strong>Aptitude Profile:</strong> Cognitive strengths supporting academic and career choices.
                    </li>
                </ul>
            </div>
        </div>

    </div>

    {{-- Dmain section start here  --}}
    <div class="domain-section">
        @foreach ($groupedResults as $domainName => $sections)
            @php$slug = Str::slug($domainName);
                                $domainDisplayName = $sections['cards'][0]['domain_display_name'] ?? $domainName;
                        @endphp ?>
            <div class="h2-banner">
                <h2 class="h2-title">{{ $domainDisplayName }}</h2>
            </div>

            <div class="meta">
                @if (isset($sections['description']) && $sections['description'])
                    <div class="careerdesc"><b>Description:</b> {!! $sections['description'] !!}</div>
                @endif
            </div>

            <div class="section-contaner">
                @foreach ($sections['cards'] ?? [] as $section)
                    <div class="section">
                        <img src="{{ asset($section['section_image']) }}" alt="{{ $section['section_name'] }} image"
                            class="meta">
                        <h3>{{ $section['section_name'] }} @if (isset($section['label']))
                                - {{ $section['label'] }}
                            @endif
                        </h3>
                        <div class="meta">{{ $domainName === 'APTITUDE' ? 'Total Score:' : 'Average Score:' }}
                            {{ $section['average'] }}</div>
                        <div class="meta">{!! strip_tags($section['section_description']) !!}</div>
                        @if ($domainName === 'OCEAN')
                            <div class="meta"><strong>{{ $section['label'] }}:</strong>
                                {{ $section['relevant_description'] }}</div>
                        @elseif ($domainName === 'WORK VALUES')
                            @if ($section['label'] === 'Low')
                                <div class="meta"><strong>Low:</strong> {{ $section['low'] }}</div>
                            @elseif ($section['label'] === 'Mid')
                                <div class="meta"><strong>Mid:</strong> {{ $section['mid'] }}</div>
                            @elseif ($section['label'] === 'High')
                                <div class="meta"><strong>High:</strong> {{ $section['high'] }}</div>
                            @endif
                        @else
                            <div class="meta"><strong>Key Traits:</strong> {{ $section['section_keytraits'] }}</div>
                            <div class="meta"><strong>Enjoys:</strong> {{ $section['section_enjoys'] }}</div>
                            <div class="meta"><strong>Ideal Environments:</strong>
                                {{ $section['section_idealenvironments'] }}</div>
                        @endif
                    </div>
                @endforeach
            </div>


            <div class="careerpath-section">
                @if (!empty($sections['cards']) && $domainName !== 'GOAL ORIENTATION')
                    @php
                        $careerPathSections = $sections['cards'];
                    @endphp
                    <div class="h2-banner">
                        <h2 class="h2-title">Suggested Career Paths</h2>
                    </div>
                    <div class="career-table">
                        <table>
                            <tbody>
                                @foreach ($careerPathSections as $sec)
                                    @php
                                        $sectionId = $sec['section_id'] ?? null;
                                        $paths = ($careerpaths[$sectionId] ?? collect())
                                            ->filter(function ($p) {
                                                return $p->sections && $p->sections->count() === 1;
                                            })
                                            ->values();
                                        $combinedCareers = collect();
                                        foreach ($paths as $p) {
                                            // Ensure career categories are loaded before merging
                                            $careersWithCategories = $p->careers->load('careerCategory');
                                            $combinedCareers = $combinedCareers->merge($careersWithCategories);
                                        }
                                        $combinedCareers = $combinedCareers->unique('id')->values();
                                    @endphp
                                    @if ($paths->isNotEmpty())
                                        <tr>
                                            <td style="width: 30%">{{ $sec['section_name'] }}</td>
                                            <td>
                                                @if ($combinedCareers->count() > 0)
                                                    {{-- @foreach ($combinedCareers as $career)
                                                        <span class="badge">
                                                            {!! $career->name !!}
                                                        </span>
                                                    @endforeach --}}

                                                    {{-- now merge and show single career cluster  --}}
                                                    @php
                                                        $uniqueCategories = $combinedCareers
                                                            ->pluck('careerCategory.name') // extract category names
                                                            ->filter() // remove null values
                                                            ->unique() // keep only unique ones
                                                            ->values();
                                                    @endphp

                                                    @foreach ($uniqueCategories as $categoryName)
                                                        {!! $categoryName !!}
                                                    @endforeach
                                                    {{-- end merging  --}}
                                                @else
                                                    <span class="meta">No careers assigned</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>


            {{-- Static bar chart (PDF-friendly, mirrors Result page data) --}}
            <div class="careerpath-chart">
                @if (!empty($sections['chart']))
                    <div class="h2-banner">
                        <h2 class="h2-title">Visual Representation of your Score</h2>
                    </div>
                    <div class="career-chart">
                        @foreach ($sections['chart'] as $sec)
                            @php
                                $value = (float) ($sec['average_value'] ?? 0);
                                $clamped = max(0, min(10, $value));
                                $percent = $clamped * 10; // 0-100
                            @endphp
                            <div class="barRow">
                                <div class="barLabel">{{ $sec['section_name'] }} ({{ $value }})</div>
                                <div class="barTrack">
                                    <div class="barFill" style="width: {{ $percent }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        @endforeach
    </div>


    <br><br>





    <div class="meta">
        <div class="h2-banner">
            <h2 class="h2-title">Integrated Analysis</h2>
        </div>
        <p>{{ $student->name }} demonstrates high emotional stability, creativity, conscientiousness, and social
            engagement. His preference for autonomy and long-term orientation aligns well with careers requiring deep
            engagement and self-direction.</p>
    </div>

    @php
        $allCategoryCountsBySection = [];
        foreach ($groupedResults as $domainName => $sections) {
            $careerPathSections = $sections['cards'] ?? [];
            foreach ($careerPathSections as $sec) {
                $sectionId = $sec['section_id'] ?? null;
                $paths = ($careerpaths[$sectionId] ?? collect())
                    ->filter(function ($p) {
                        return $p->sections && $p->sections->count() === 1;
                    })
                    ->values();

                if ($paths->isEmpty()) {
                    continue;
                }

                $combinedCareers = collect();
                foreach ($paths as $p) {
                    $combinedCareers = $combinedCareers->merge($p->careers->load('careerCategory'));
                }
                $combinedCareers = $combinedCareers->unique('id')->values();

                $counts = $combinedCareers
                    ->map(function ($career) {
                        return optional($career->careerCategory)->name;
                    })
                    ->filter()
                    ->countBy()
                    // ->filter(function ($count) {
                    //     return $count > 1;
                    // })
                    ->sortDesc();

                if ($counts->isNotEmpty()) {
                    $allCategoryCountsBySection[] = [
                        'domain' => $domainName,
                        'section' => $sec['section_name'],
                        'counts' => $counts,
                    ];
                }
            }
        }
    @endphp



    <div class="meta">
        <div class="h2-banner">
            <h2 class="h2-title">Career Clusters with Total Weightage</h2>
        </div>
        @php
            // Group previously computed counts by domain
            $repeatedByDomain = collect($allCategoryCountsBySection ?? [])->groupBy('domain');

            // Compute overall weighted totals per career cluster across all domains
            $overallCategoryWeightages = [];
            foreach ($groupedResults as $domainName => $sections) {
                $weight = (float) ($sections['domain_weightage'] ?? 0);
                if ($weight === 0) {
                    continue;
                }

                $entries = $repeatedByDomain->get($domainName, collect());
                foreach ($entries as $e) {
                    $counts = $e['counts'];
                    $arr = is_object($counts) && method_exists($counts, 'all') ? $counts->all() : (array) $counts;
                    foreach ($arr as $cat => $cnt) {
                        if (!isset($overallCategoryWeightages[$cat])) {
                            $overallCategoryWeightages[$cat] = 0;
                        }
                        $overallCategoryWeightages[$cat] += ((int) $cnt) * $weight;
                    }
                }
            }

            arsort($overallCategoryWeightages);
        @endphp

        @if (!empty($overallCategoryWeightages))
            <table>
                <thead>
                    <tr>
                        <th>Career Cluster</th>
                        <th style="text-align: right;">Total Weightage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($overallCategoryWeightages as $catName => $totalWeighted)
                        <tr>
                            <td><strong>{!! $catName !!}</strong></td>
                            <td style="text-align: right;">
                                {{ rtrim(rtrim(number_format($totalWeighted, 2, '.', ''), '0'), '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="meta">No career clusters to display.</div>
        @endif
    </div>

    <div class="meta" style="margin-top: 10px;">
        <div class="h2-banner">
            <h2 class="h2-title">Customized Career Recommendation</h2>
        </div>
        @php
            $categoryDetails = \App\Models\CareerCategory::whereIn('name', array_keys($overallCategoryWeightages ?? []))
                ->get()
                ->keyBy('name');
        @endphp
        @foreach ($overallCategoryWeightages ?? [] as $catName => $totalWeighted)
            @php
                $roles = optional($categoryDetails->get($catName))->example_roles;
                $hook = optional($categoryDetails->get($catName))->hook;
                $what_is_it = optional($categoryDetails->get($catName))->what_is_it;
                $subjects = optional($categoryDetails->get($catName))->subjects;
                $core_apptitudes_to_highlight = optional($categoryDetails->get($catName))->core_apptitudes_to_highlight;
                $value_and_personality_edge = optional($categoryDetails->get($catName))->value_and_personality_edge;
                $why_it_could_fit_you = optional($categoryDetails->get($catName))->why_it_could_fit_you;
                $early_actions = optional($categoryDetails->get($catName))->early_actions;
                $india_study_pathways = optional($categoryDetails->get($catName))->india_study_pathways;
                $future_trends = optional($categoryDetails->get($catName))->future_trends;
            @endphp
            <div class="section" style="margin-bottom: 10px;">
                <div class="row" style="justify-content: space-between; align-items: center;">
                    <div class="col" style="flex: none;">
                        <h3 style="margin:0; font-size: 14px;">{!! $catName !!}@if (!empty($hook))
                                - {!! $hook !!}
                            @endif
                        </h3>
                    </div>

                </div>

                <div class="meta" style="margin-top: 6px;">
                    @if (!empty($what_is_it))
                        <div style="margin-bottom:6px;">{!! $what_is_it !!}</div>
                    @endif

                    @if (!empty($roles))
                        <div style="margin-bottom:6px;"><strong>Example Roles</strong> -
                            <span>{!! $roles !!}</span>
                        </div>
                    @endif

                    @if (!empty($subjects))
                        <div style="margin-bottom:6px;"><strong>Subjects</strong> - <span>{!! $subjects !!}</span>
                        </div>
                    @endif

                    @if (!empty($core_apptitudes_to_highlight))
                        <div style="margin-bottom:6px;"><strong>Core aptitudes to highlight</strong> -
                            <span>{!! $core_apptitudes_to_highlight !!}</span>
                        </div>
                    @endif

                    @if (!empty($value_and_personality_edge))
                        <div style="margin-bottom:6px;"><strong>Value and personality edge</strong> -
                            <span>{!! $value_and_personality_edge !!}</span>
                        </div>
                    @endif

                    @if (!empty($why_it_could_fit_you))
                        <div style="margin-bottom:6px;"><strong>Why it could fit you</strong> -
                            <span>{!! $why_it_could_fit_you !!}</span>
                        </div>
                    @endif

                    @if (!empty($early_actions))
                        <div style="margin-bottom:6px;"><strong>Early actions</strong> -
                            <span>{!! $early_actions !!}</span>
                        </div>
                    @endif

                    @if (!empty($india_study_pathways))
                        <div style="margin-bottom:6px;"><strong>India study pathways</strong> -
                            <span>{!! $india_study_pathways !!}</span>
                        </div>
                    @endif

                    @if (!empty($future_trends))
                        <div style="margin-bottom:6px;"><strong>Future trends</strong> -
                            <span>{!! $future_trends !!}</span>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="meta">
        <div class="h2-banner">
            <h2 class="h2-title">Counselor's Remarks</h2>
        </div>
        <p>{{ $student->name }} exhibits a balanced and mature personality marked by self-awareness
            and goal clarity. With strong cognitive strengths and humanistic values, {{ $student->name }} can grow into
            leadership roles in fields that demand both intellect and empathy. Encouraging exploratory learning and
            mentorship will enrich this trajectory.</p>
    </div>

    <div class="meta">
        <p>Signature</p>
        <p>XYZ</p>
        <p>Career Counsellor</p>
    </div>

    <br>
    <br>
    <!-- Fixed footer that repeats on every page (must be inside body for dompdf) -->
    <div class="pdf-footer">
        <div class="footer-top-stripe-1"></div>
        <div class="footer-top-stripe-2"></div>
        <div class="footer-inner">
            <div class="footer-left">+91 94372 08179</div>
            <div class="footer-center">connect@careermap.in</div>
            <div class="footer-right">Page {PAGE_NUM}</div>
        </div>
    </div>

    {{-- Generate this pdf report to image format code  --}}
    {{-- @if (!empty($export_image))
        <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
        <script>
            (function() {
                function downloadPng() {
                    const body = document.body;
                    const prevBg = body.style.backgroundColor;
                    body.style.backgroundColor = '#ffffff';
                    html2canvas(body, { scale: 2, useCORS: true, backgroundColor: '#ffffff' }).then(function(canvas) {
                        const dataUrl = canvas.toDataURL('image/png');
                        const link = document.createElement('a');
                        var studentName = @json($student->name ?? 'report');
                        var safe = String(studentName).replace(/[^a-z0-9]+/gi, '-').replace(/^-+|-+$/g, '').toLowerCase();
                        link.href = dataUrl;
                        link.download = (safe || 'report') + '-full-report.png';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        body.style.backgroundColor = prevBg;
                    }).catch(function() {
                        alert('Failed to generate image');
                        body.style.backgroundColor = prevBg;
                    });
                }
                if (document.readyState === 'complete' || document.readyState === 'interactive') {
                    setTimeout(downloadPng, 500);
                } else {
                    document.addEventListener('DOMContentLoaded', function(){ setTimeout(downloadPng, 500); });
                }
            })();
        </script>
    @endif --}}
</body>

</html>
