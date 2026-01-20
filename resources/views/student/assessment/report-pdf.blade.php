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

        .h2-banner {
            position: relative;
            height: 52px;

            /* BACKGROUND IMAGE */
            background-image: url('{{ asset('images/h2-bg.png') }}');
            background-repeat: no-repeat;
            background-position: left center;
            background-size: auto 100%;

            /* TEXT COLOR */
            color: #ffffff;

            /* SPACE FOR TEXT */
            padding-left: 70px;
            padding-right: 20px;

            display: flex;
            align-items: center;

            margin: 16px 0 0px 0;
        }


        .h2-banner .h2-title {
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0px;
            color: #ffffff;
        }

        .h2-title {
            padding-top: 10px;
        }


        /* .h2-banner::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: #f97316;
            z-index: 1;
        } */

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




        /* ===== IMAGE-2 STYLE COVER ===== */

        .cover-v2 {
            text-align: center;
            position: relative;
            padding-top: 40px;
        }

        /* Title */
        .cover-v2 .cover-title {
            font-size: 42px;
            font-weight: bolder;
            color: #9f1d1d;
            line-height: 1.15;
            letter-spacing: 0.6px;
            /* margin-bottom: 8px; */
            font-family: sans-serif !important;
        }

        /* Subtitle strip */
        .cover-v2 .cover-subtitle {
            display: inline-block;
            padding: 0px 18px;
            font-size: 24px;
            /* font-weight: 600; */
            color: #0c0c0c;
            /* padding-top: 100px; */
            margin-top: -53px;
        }

        /* Illustration */
        .cover-v2 .cover-illustration-wrap img {
            max-width: 280px;
            margin: 30px auto 24px;
        }

        /* Student info box */
        .cover-v2 .canva-student-box {
            width: 75%;
            margin: 0 auto;
            padding: 5px 16px;
            font-size: 20px;
            margin-top: 480px;
            text-align: left;
        }

        /* Student title badge */
        .cover-v2 .cover-student-title {
            background: #fdecec;
            color: #9f1d1d;
            font-weight: 700;
            font-size: 20px;
            padding: 5px 10px;
            border-radius: 4px;
            width: 250px;
        }

        /* Decorative bottom shape */
        .cover-v2 .cover-footer-shape {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 160px;
            height: 160px;
            background: #9f1d1d;
            border-top-left-radius: 160px;
        }


        .cover-header-content {
            padding-left: 280px !important;
        }

        /* Auto-adjust cover spacing for PDF */
        @page {
            size: A4;
            margin: 0;
            counter-increment: page;
        }

        .page-number:before {
            content: "Page " counter(page);
        }



        /* Canva top-left decorative blocks */
        .cover-top-blocks {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            /* adjust if needed */
            z-index: 5;
        }


        @media print {
            .cover-header {
                padding-top: 30px;
                padding-bottom: 22px;
            }

            .cover-illustration-wrap {
                margin: 22px 0 18px;
            }

            .canva-student-box {
                width: 75%;
            }
        }


        /* Fixed header that repeats on every non-cover page */
        .pdf-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            z-index: 1000;
            background: #ffffff;
        }

        .pdf-header-inner {
            /* height: 40px; */
            padding: 30px;
            /* border-bottom: 2px solid #9f1d1d; */
            font-size: 17px;
            color: #000000;
        }

        /* STUDENT NAME → LEFT */
        .pdf-header-right {
            order: 1;
            text-align: left;
            font-weight: 600;
        }

        /* LOGO → RIGHT */
        .pdf-header-left {
            order: 2;
            display: flex;
            align-items: center;
        }

        .pdf-header-left img {
            height: 26px;
        }


        /* Repeating footer for every PDF page */
        .pdf-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
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
        /* .pdf-footer .footer-inner {
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
        } */

        .pdf-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            z-index: 1000;
            background: #ffffff;
        }

        /* .footer-top-stripe-1 {
            height: 2px;
            background: #9f1d1d;
        }

        .footer-top-stripe-2 {
            height: 2px;
            background: #f59e0b;
        } */

        .footer-inner {
            padding: 10px 32px;
        }


        /* Ensure the first section renders as a standalone cover page */
        .cover-page {
            position: relative;
            width: 100%;
            height: 100vh;
            /* fallback */

            /* PDF-safe A4 size */
            min-height: 297mm;
            page-break-after: always;

            background-image: url('{{ asset('images/coverpage.png') }}');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            /* 🔥 THIS IS THE KEY */
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

        .pdf-page {
            padding-top: 90px;
            /* 🔥 NOT margin */
            padding-bottom: 80px;
            padding-left: 32px;
            padding-right: 32px;
            page-break-inside: auto;
        }

        .intro-image-wrap {
            text-align: center;
            margin-top: 0px;
        }

        .intro-image-wrap img {
            width: 320px;
            /* Canva-like size */
            height: auto;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
    @php use Illuminate\Support\Str; @endphp
    @php $student = $student ?? auth()->user(); @endphp
</head>

<body>

    {{-- Cover page start here  --}}
    <div class="cover-page">
        <div class="cover-inner canva-cover cover-v2">



            <!-- Top band -->
            <div class="cover-header">
                <div class="cover-header-content">
                    <img src="{{ asset('images/footerlogo.png') }}" style="height: 50px; margin-left: 330px;"
                        class="cover-logo-img">
                    <div class="cover-title">
                        COMPREHENSIVE<br>
                        PSYCHOMETRIC<br>
                        <span style=" font-size: 25px;">ASSESSMENT REPORT</span>
                    </div>
                    <br><br><br><br>
                    <div class="cover-subtitle">
                        Discover Your True<br>
                        Strengths and Potential.
                    </div>
                </div>
            </div>

            <!-- Student Info -->
            <div class="cover-student-box canva-student-box">
                <div class="cover-student-title">Student Information</div>
                <div>Name: {{ $student->name }}</div>
                <div>Class: {{ $student->class ?? '-' }}</div>
                <div>School Name: {{ optional($student)->school_name ?? '-' }}</div>
                <div>Date: {{ date('d M Y') }}</div>
                <div>Email Id: {{ $student->email ?? '-' }}</div>
                <div>Phone No: {{ optional($student)->phone ?? '-' }}</div>
            </div>
            {{-- <div class="cover-footer-shape"></div> --}}

        </div>
    </div>
    {{-- Cover page end here  --}}


    <!-- Fixed header -->
    <div class="pdf-header">
        <div class="pdf-header-inner">
            <table width="100%" cellpadding="0" cellspacing="0" style="border-bottom: 2px solid #9f1d1d;">
                <tr>
                    <!-- NAME → LEFT -->
                    <td align="left" style="font-size:18px; font-weight:600; border: none;">
                        {{ $student->name }}
                    </td>

                    <!-- LOGO → RIGHT -->
                    <td align="right" style="border: none;">
                        <img src="{{ asset('images/footerlogo.png') }}" style="height:40px;">
                    </td>
                </tr>
            </table>
        </div>

    </div>

    <!-- Fixed footer -->
    <div class="pdf-footer">
        <div class="footer-inner">
            <table width="100%" cellpadding="0" cellspacing="0" style="border-top: 2px solid #9f1d1d;">
                <tr>
                    <!-- LEFT -->
                    <td align="left" style="font-size:16px; color:#000000; border: none;">
                        ☎ +91 94372 08179
                    </td>
                    <!-- CENTER -->
                    <td align="left" style="font-size:17px; color:#000000; border: none;">
                        ✉ connect@careermap.in
                    </td>
                    <!-- RIGHT -->
                    <td align="right" class="page-number" style="font-size:16px; color:#000000; border: none;">
                    </td>
                </tr>
            </table>
        </div>
    </div>




    {{-- Introduction start page  --}}
    <div class="pdf-page">
        <div class="h2-banner">
            <h2 class="h2-title">Introduction</h2>
        </div>

        <p class="meta" style="font-size: 18px;">The report presented by Career Map outlines key observations about
            {{ $student->name }}'s personality profile, career interests, work preferences, cognitive
            strengths,
            and future career orientation. These outcomes are indicative, not definitive, and must be reviewed
            again in subsequent counselling meetings. Recommendations may shift based on deeper interaction and
            continuous assessment.
        </p>

        <!-- CENTRAL IMAGE -->
        <div class="intro-image-wrap">
            <img src="{{ asset('images/alldomain.png') }}" style="height: 550px; width: 550px;"
                alt="Psychometric Domains">
        </div>
    </div>

    {{-- this code helps to break any page of pdf --}}
    {{-- <div class="page-break"></div> --}}

    {{-- Domain section start here  --}}
    <div class="pdf-page domain-section">
        @foreach ($groupedResults as $domainName => $sections)
            @php
                $slug = Str::slug($domainName);
                $domainDisplayName = $sections['cards'][0]['domain_display_name'] ?? $domainName;
            @endphp
            <div class="h2-banner">
                <h2 class="h2-title">{{ $domainDisplayName }}</h2>
            </div>

            <div class="meta">
                @if (isset($sections['description']) && $sections['description'])
                    <div class="careerdesc" style="font-size: 14px;"><b>Description:</b> {!! $sections['description'] !!}</div>
                @endif

                @if ($domainDisplayName === 'INTEREST')
                    <!-- CENTRAL IMAGE -->
                    <div class="intro-image-wrap">
                        <img src="{{ asset('images/domainriasec.png') }}" style="height: 530px; width: 530px;"
                            alt="Psychometric Domains">
                    </div>
                    <div class="page-break"></div>
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


            <div class="pdf-page careerpath-section">
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
            <div class="pdf-page careerpath-chart">
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


    <div class="pdf-page ">
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



    <div class="pdf-page meta">
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

    <div class="pdf-page meta" style="margin-top: 10px;">
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
                        <div style="margin-bottom:6px;"><strong>Subjects</strong> -
                            <span>{!! $subjects !!}</span>
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

    <div class="pdf-page meta">
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


</body>

</html>
