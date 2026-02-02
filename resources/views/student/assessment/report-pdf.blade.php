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
            /* background-image: url('{{ asset('images/h2-bg.png') }}'); */
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

        .h2-subbanner {
            height: 125px;
            width: 600px;

            background-image: url('{{ asset('images/subtitlebanner.png') }}');
            background-repeat: no-repeat;
            background-position: left center;
            background-size: auto 100%;

            display: flex;
            align-items: left;


            margin: 0px 12px;
        }


        .h2-subbanner .sub-text {
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.4px;
            text-transform: uppercase;
            color: #e0f2ff;
            margin-bottom: 2px;
            margin-top: 40px;
            margin-left: 80px;
        }

        .h2-subbanner .main-text {
            font-size: 18px;
            font-weight: 800;
            color: #000000;
            line-height: 1.1;
            margin-left: 80px;
            text-transform: uppercase;
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



        .pdf-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            z-index: 1000;
            background: #ffffff;
        }



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


        /* ===== INTEREST CARDS (Image-2 EXACT STYLE) ===== */

        .interest-card {
            display: flex;
            flex-direction: row;
            /* FORCE left-right */
            gap: 16px;
            margin-bottom: 18px;
            align-items: flex-start;
            width: 100%;
        }

        /* LEFT COLUMN */
        .interest-left {
            width: 220px;
            /* MUST be smaller */
            flex-shrink: 0;
            /* prevent collapsing */
        }

        /* TITLE BACKGROUND IMAGE BAR */
        .titlebackground {
            position: relative;
            width: 230px;
            /* 🔥 REDUCE from 350px */
            height: 60px;
            /* match design */

            /* background-image: url('{{ asset('images/sectionbackground.png') }}'); */
            /* <-- YOUR BAR IMAGE */
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: left center;

            display: flex;
            align-items: center;
            /* padding-left: 42px; */
            margin-bottom: 6px;
            margin-right: 25px;
        }

        /* NUMBER CIRCLE */
        .titlebackground .interest-badge {
            position: absolute;
            left: -14px;
            top: 50%;
            transform: translateY(-50%);

            width: 34px;
            height: 34px;
            border-radius: 50%;

            /* background: #1e1b8a; */
            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 11px;
            font-weight: 800;
        }

        /* TITLE TEXT ON BAR */
        .titlebackground .interest-title {
            background: transparent !important;
            color: #ffffff;
            font-weight: 800;
            font-size: 14px;
            text-transform: uppercase;
            padding: 0;
        }

        /* SCORE PILL */
        .interest-score {
            margin-top: 6px;
            width: 140px;

            /* background: #38bdf8; */
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;

            padding: 6px 8px;
            border-radius: 4px;
            text-align: center;
        }

        /* RIGHT DESCRIPTION BOX */
        .interest-right {
            flex: 1;
            width: auto;
            /* background: #38b6ff; */
            padding: 14px;
            border-radius: 8px;
            font-size: 12px;
            line-height: 1.45;
        }

        /* spacing inside right box */
        .interest-right>div {
            margin-bottom: 4px;
        }


        /* Suggested career path css  */
        .h2-banner-suggested-career {
            position: relative;
            height: 90px;
            /* Taller like Canva */
            width: 530px;
            /* Slightly wider */

            /* background-image: url('{{ asset('images/careerpath.png') }}'); */
            background-repeat: no-repeat;
            background-position: left center;
            background-size: 100% 100%;
            /* FORCE exact pill shape */

            display: block;
            /* PDF engines handle this better */

            margin: 20px 0 25px 80px;
        }

        .suggested-title-wrap {
            position: absolute;
            top: 70%;
            left: 110px;
            /* Push after circle */
            transform: translateY(-50%);

            font-size: 22px;
            font-weight: 800;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;

            line-height: 1;
        }

        /* ===== Canva-style career paths UI (NO backend change) ===== */

        .career-block {
            margin-bottom: 18px;
        }

        .career-category {
            position: relative;
            width: 280px;
            /* Adjust to match design */
            height: 42px;

            /* background-image: url('{{ asset('images/career-folder.png') }}'); */
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: left center;

            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;

            padding-left: 48px;
            /* Push text after folder tab */
            padding-top: 11px;

            margin-bottom: 8px;
        }

        .career-category-title {
            margin-top: 7px;
            font-size: 14px;
            margin-left: 55px;
        }


        .career-grid {
            display: table;
            width: 100%;
        }

        .career-row {
            display: table-row;
        }

        .career-cell {
            display: table-cell;
            width: 33.33%;
            vertical-align: top;
            padding: 4px 10px;
            font-size: 12px;
            color: #111827;
        }

        .career-item {
            margin-bottom: 4px;
            padding-left: 14px;
            position: relative;
            font-size: 13px;
        }

        /* .career-item:before {
            content: "■";
            position: absolute;
            left: 0;
            top: 1px;
            font-size: 8px;
            color: #38bdf8;
        } */

        /* ===== Visual Score custom banner (Canva style) ===== */

        .visual-score-banner {
            position: relative;
            width: 450px;
            /* match Canva */
            height: 100px;

            background-image: url('{{ asset('images/visual-score-pill.png') }}');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: left center;

            margin: 10px 0 25px 60px;
            /* left indent like Canva */
        }

        .visual-score-title {
            position: absolute;
            top: 50%;
            left: 75px;
            /* after circle */
            transform: translateY(-50%);

            font-size: 15px;
            font-weight: 800;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== Donut chart styles (PDF safe SVG) ===== */

        .donut-wrap {
            display: table;
            width: 100%;
            margin-top: 10px;
        }

        .donut-left {
            display: table-cell;
            width: 260px;
            vertical-align: middle;
            text-align: center;
        }

        .donut-right {
            display: table-cell;
            vertical-align: middle;
            padding-left: 20px;
        }

        .donut-legend-item {
            margin-bottom: 6px;
            font-size: 12px;
        }

        .donut-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
        }

        /* For PERSONALITY domain  */
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
        <div class="h2-banner" style=" background-image: url('{{ asset('images/h2-bg.png') }}') !important;">
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
    <div class="page-break"></div>

    {{-- Domain section start here  --}}
    <div class="domain-section">
        @foreach ($groupedResults as $domainName => $sections)
            <div class="pdf-page">
                @php
                    $slug = Str::slug($domainName);
                    $domainDisplayName = $sections['cards'][0]['domain_display_name'] ?? $domainName;
                @endphp

                @if ($domainDisplayName === 'INTEREST' && $domainDisplayName === 'LEARNING STYLE')
                    <div class="h2-banner"
                        style=" background-image: url('{{ asset('images/h2-bg.png') }}') !important;">
                        <h2 class="h2-title">{{ $domainDisplayName }}</h2>
                    </div>
                @elseif ($domainDisplayName === 'PERSONALITY')
                    <div class="h2-banner"
                        style=" background-image: url('{{ asset('images/h2-green.png') }}') !important;">
                        <h2 class="h2-title">{{ $domainDisplayName }}</h2>
                    </div>
                @else
                    <div class="h2-banner"
                        style=" background-image: url('{{ asset('images/h2-bg.png') }}') !important;">
                        <h2 class="h2-title">{{ $domainDisplayName }}</h2>
                    </div>
                @endif

                <div class="meta">
                    @if (isset($sections['description']) && $sections['description'])
                        <div class="careerdesc" style="font-size: 14px;"><b>Description:</b> {!! $sections['description'] !!}
                        </div>
                    @endif

                    @if ($domainDisplayName === 'INTEREST')
                        <!-- CENTRAL IMAGE -->
                        <div class="intro-image-wrap">
                            <img src="{{ asset('images/domainriasec.png') }}" style="height: 530px; width: 530px;"
                                alt="Psychometric Domains">
                        </div>
                    @elseif ($domainDisplayName === 'PERSONALITY')
                        <!-- CENTRAL IMAGE -->
                        <div class="intro-image-wrap">
                            <img src="{{ asset('images/PERSONALITY.png') }}" style="height: 430px; width: 430px;"
                                alt="Psychometric Domains">
                        </div>
                    @endif
                </div>
            </div>

            <div class="page-break"></div>

            <div class="pdf-page">
                @if ($domainDisplayName === 'INTEREST')
                    <div class="h2-subbanner">
                        <div>
                            @php
                                $cards = collect($sections['cards'] ?? []);
                                $count = $cards->count();
                                $interestNames = $cards->pluck('section_name')->implode(', ');
                            @endphp

                            <div class="sub-text">
                                YOUR TOP {{ $count }} CAREER INTEREST{{ $count > 1 ? 'S' : '' }} ARE
                            </div>

                            <div class="main-text">
                                {{ $interestNames }}
                            </div>
                        </div>
                    </div>
                @endif

                {{-- new code --}}
                <div class="section-contaner">
                    @foreach ($sections['cards'] ?? [] as $index => $section)
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>

                                @if ($domainDisplayName === 'INTEREST' && $domainDisplayName === 'LEARNING STYLE')
                                    {{-- LEFT COLUMN --}}
                                    <td width="80" valign="top" style="border: none;">
                                        {{-- @if ($domainDisplayName === 'INTEREST' && $domainDisplayName === 'LEARNING STYLE') --}}
                                        <div class="titlebackground"
                                            style="background-image: url('{{ asset('images/sectionbackground.png') }}') !important;">
                                            <div class="interest-badge"
                                                style="margin-top: 12px; margin-left: 46px; font-size: 11px;">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>
                                            <div class="interest-title"
                                                style="margin-top: 23px; margin-left: 55px; font-size: 15px;">
                                                {{ $section['section_name'] }}
                                            </div>
                                        </div>

                                        <div class="interest-score"
                                            style="margin-top: 130px; margin-left: 30px;background: #38bdf8;">
                                            {{ $domainName === 'APTITUDE' ? 'TOTAL SCORE:' : 'AVERAGE SCORE:' }}
                                            {{ $section['average'] }}
                                        </div>

                                    </td>

                                    {{-- RIGHT COLUMN --}}
                                    <td width="330" valign="top" style="border: none;">

                                        <div class="interest-right" style="background: #38b6ff;">

                                            <div>
                                                {!! strip_tags($section['section_description']) !!}
                                            </div>

                                            @if ($domainName === 'OCEAN')
                                                <div><strong>{{ $section['label'] }}:</strong>
                                                    {{ $section['relevant_description'] }}
                                                </div>
                                            @elseif ($domainName === 'WORK VALUES')
                                                @if ($section['label'] === 'Low')
                                                    <div><strong>Low:</strong> {{ $section['low'] }}</div>
                                                @elseif ($section['label'] === 'Mid')
                                                    <div><strong>Mid:</strong> {{ $section['mid'] }}</div>
                                                @elseif ($section['label'] === 'High')
                                                    <div><strong>High:</strong> {{ $section['high'] }}</div>
                                                @endif
                                            @else
                                                <div><strong>Key Traits:</strong> {{ $section['section_keytraits'] }}
                                                </div>
                                                <div><strong>Enjoys:</strong> {{ $section['section_enjoys'] }}</div>
                                                <div><strong>Ideal Environments:</strong>
                                                    {{ $section['section_idealenvironments'] }}
                                                </div>
                                            @endif

                                        </div>

                                    </td>
                                @elseif ($domainDisplayName === 'PERSONALITY')
                                    {{-- LEFT COLUMN --}}
                                    <td width="80" valign="top" style="border: none;">
                                        <div class="titlebackground"
                                            style="background-image: url('{{ asset('images/sectionbackground-green.png') }}') !important;">
                                            <div class="interest-badge"
                                                style="margin-top: 12px; margin-left: 46px; font-size: 11px;">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>
                                            <div class="interest-title"
                                                style="margin-top: 23px; margin-left: 55px; font-size: 15px;">
                                                {{ $section['section_name'] }}
                                            </div>
                                        </div>

                                        {{-- <div class="interest-score"
                                            style="margin-top: 130px; margin-left: 30px; background: #24a401;">
                                            {{ $domainName === 'APTITUDE' ? 'TOTAL SCORE:' : 'AVERAGE SCORE:' }}
                                            {{ $section['average'] }}
                                        </div> --}}

                                    </td>

                                    {{-- RIGHT COLUMN --}}
                                    <td width="330" valign="top" style="border: none;">
                                        <div class="interest-right" style="background: #24a401;">
                                            <p
                                                style="color: #ffffff !important; text-align: center !important; font-size: 12px !important; font-weight: 600 !important;">
                                                {{ $domainName === 'APTITUDE' ? 'TOTAL SCORE:' : 'AVERAGE SCORE:' }}
                                                {{ $section['average'] }}
                                            </p>
                                            <div>
                                                {!! strip_tags($section['section_description']) !!}
                                            </div>

                                            @if ($domainName === 'OCEAN')
                                                <div><strong>{{ $section['label'] }}:</strong>
                                                    {{ $section['relevant_description'] }}
                                                </div>
                                            @elseif ($domainName === 'WORK VALUES')
                                                @if ($section['label'] === 'Low')
                                                    <div><strong>Low:</strong> {{ $section['low'] }}</div>
                                                @elseif ($section['label'] === 'Mid')
                                                    <div><strong>Mid:</strong> {{ $section['mid'] }}</div>
                                                @elseif ($section['label'] === 'High')
                                                    <div><strong>High:</strong> {{ $section['high'] }}</div>
                                                @endif
                                            @else
                                                <div><strong>Key Traits:</strong> {{ $section['section_keytraits'] }}
                                                </div>
                                                <div><strong>Enjoys:</strong> {{ $section['section_enjoys'] }}</div>
                                                <div><strong>Ideal Environments:</strong>
                                                    {{ $section['section_idealenvironments'] }}
                                                </div>
                                            @endif

                                        </div>

                                    </td>
                                @else
                                    {{-- LEFT COLUMN --}}
                                    <td width="80" valign="top" style="border: none;">
                                        <div class="titlebackground"
                                            style="background-image: url('{{ asset('images/sectionbackground.png') }}') !important;">
                                            <div class="interest-badge"
                                                style="margin-top: 12px; margin-left: 46px; font-size: 11px;">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>
                                            <div class="interest-title"
                                                style="margin-top: 23px; margin-left: 55px; font-size: 15px;">
                                                {{ $section['section_name'] }}
                                            </div>
                                        </div>

                                        <div class="interest-score"
                                            style="margin-top: 130px; margin-left: 30px;background: #38bdf8;">
                                            {{ $domainName === 'APTITUDE' ? 'TOTAL SCORE:' : 'AVERAGE SCORE:' }}
                                            {{ $section['average'] }}
                                        </div>

                                    </td>

                                    {{-- RIGHT COLUMN --}}
                                    <td width="330" valign="top" style="border: none;">
                                        <div class="interest-right" style="background: #38b6ff;">
                                            <div>
                                                {!! strip_tags($section['section_description']) !!}
                                            </div>
                                            @if ($domainName === 'OCEAN')
                                                <div><strong>{{ $section['label'] }}:</strong>
                                                    {{ $section['relevant_description'] }}
                                                </div>
                                            @elseif ($domainName === 'WORK VALUES')
                                                @if ($section['label'] === 'Low')
                                                    <div><strong>Low:</strong> {{ $section['low'] }}</div>
                                                @elseif ($section['label'] === 'Mid')
                                                    <div><strong>Mid:</strong> {{ $section['mid'] }}</div>
                                                @elseif ($section['label'] === 'High')
                                                    <div><strong>High:</strong> {{ $section['high'] }}</div>
                                                @endif
                                            @else
                                                <div><strong>Key Traits:</strong> {{ $section['section_keytraits'] }}
                                                </div>
                                                <div><strong>Enjoys:</strong> {{ $section['section_enjoys'] }}</div>
                                                <div><strong>Ideal Environments:</strong>
                                                    {{ $section['section_idealenvironments'] }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        </table>
                    @endforeach
                </div>
            </div>

            <div class="page-break"></div>



            <div class="pdf-page careerpath-section">
                @if (!empty($sections['cards']) && $domainName !== 'GOAL ORIENTATION')
                    @php
                        $careerPathSections = $sections['cards'];
                    @endphp
                    @if ($domainDisplayName === 'INTEREST' && $domainDisplayName === 'LEARNING STYLE')
                        <div class="h2-banner-suggested-career"
                            style=" background-image: url('{{ asset('images/careerpath.png') }}') !important;">
                            <div class="suggested-title-wrap">
                                Suggested Career Paths
                            </div>
                        </div>
                    @elseif ($domainDisplayName === 'PERSONALITY')
                        <div class="h2-banner-suggested-career"
                            style=" background-image: url('{{ asset('images/careerpath-green.png') }}') !important;">
                            <div class="suggested-title-wrap" style="color: #000000 !important;">
                                Suggested Career Paths
                            </div>
                        </div>
                    @else
                        <div class="h2-banner-suggested-career"
                            style=" background-image: url('{{ asset('images/careerpath.png') }}') !important;">
                            <div class="suggested-title-wrap">
                                Suggested Career Paths
                            </div>
                        </div>
                    @endif


                    {{-- new code  --}}
                    <div class="career-table">

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
                                    // KEEP your exact merge logic
                                    $careersWithCategories = $p->careers->load('careerCategory');
                                    $combinedCareers = $combinedCareers->merge($careersWithCategories);
                                }
                                $combinedCareers = $combinedCareers->unique('id')->values();

                                // KEEP your merged unique categories (DO NOT CHANGE)
                                $uniqueCategories = $combinedCareers
                                    ->pluck('careerCategory.name')
                                    ->filter()
                                    ->unique()
                                    ->values();

                                // UI ONLY — split into 3 columns
                                $chunks = $uniqueCategories->chunk(ceil($uniqueCategories->count() / 3));
                            @endphp

                            @if ($uniqueCategories->count() > 0)
                                <div class="career-block">

                                    <!-- Blue category header (folder style) -->
                                    @if ($domainDisplayName === 'INTEREST' && $domainDisplayName === 'LEARNING STYLE')
                                        <div class="career-category"
                                            style="background-image: url('{{ asset('images/career-folder.png') }}') !important;">
                                            <div class="career-category-title">
                                                {{ $sec['section_name'] }}
                                            </div>
                                        </div>
                                    @elseif ($domainDisplayName === 'PERSONALITY')
                                        <div class="career-category"
                                            style="background-image: url('{{ asset('images/career-folder-green.png') }}') !important;">
                                            <div class="career-category-title" style="color: #000000 !important;">
                                                {{ $sec['section_name'] }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="career-category"
                                            style="background-image: url('{{ asset('images/career-folder.png') }}') !important;">
                                            <div class="career-category-title">
                                                {{ $sec['section_name'] }}
                                            </div>
                                        </div>
                                    @endif
                                    <!-- Canva-style 3-column layout (PDF safe) -->
                                    <div class="career-grid">
                                        <div class="career-row">
                                            @foreach ($chunks as $col)
                                                <div class="career-cell">
                                                    @if ($domainDisplayName === 'INTEREST' && $domainDisplayName === 'LEARNING STYLE')
                                                        <style>
                                                            .career-item:before {
                                                                content: "■";
                                                                position: absolute;
                                                                left: 0;
                                                                top: 1px;
                                                                font-size: 8px;
                                                                color: #38bdf8;
                                                            }
                                                        </style>
                                                        @foreach ($col as $categoryName)
                                                            <div class="career-item">
                                                                {!! $categoryName !!}
                                                            </div>
                                                        @endforeach
                                                    @elseif ($domainDisplayName === 'PERSONALITY')
                                                        <style>
                                                            .career-item:before {
                                                                content: "■";
                                                                position: absolute;
                                                                left: 0;
                                                                top: 1px;
                                                                font-size: 8px;
                                                                color: #18ad00 !important;
                                                            }
                                                        </style>
                                                        @foreach ($col as $categoryName)
                                                            <div class="career-item">
                                                                {!! $categoryName !!}
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <style>
                                                            .career-item:before {
                                                                content: "■";
                                                                position: absolute;
                                                                left: 0;
                                                                top: 1px;
                                                                font-size: 8px;
                                                                color: #38bdf8;
                                                            }
                                                        </style>
                                                        @foreach ($col as $categoryName)
                                                            <div class="career-item">
                                                                {!! $categoryName !!}
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>


            <div class="page-break"></div>

            {{-- Static bar chart (PDF-friendly, mirrors Result page data) --}}
            <div class="pdf-page careerpath-chart">
                @if (!empty($sections['chart']))
                    @if ($domainDisplayName === 'INTEREST' && $domainDisplayName === 'LEARNING STYLE')
                    <div class="visual-score-banner" style=" background-image: url('{{ asset('images/visual-score-pill.png') }}') !important;">
                        <div class="visual-score-title">
                            Visual Representation of Your Score
                        </div>
                    </div>
                    @elseif ($domainDisplayName === 'PERSONALITY')
                    <div class="visual-score-banner" style=" background-image: url('{{ asset('images/visual-score-pill-green.png') }}') !important;">
                        <div class="visual-score-title">
                            Visual Representation of Your Score
                        </div>
                    </div>
                    @else
                    <div class="visual-score-banner" style=" background-image: url('{{ asset('images/visual-score-pill.png') }}') !important;">
                        <div class="visual-score-title">
                            Visual Representation of Your Score
                        </div>
                    </div>
                    @endif
                    <div class="career-chart">

                        @if ($domainDisplayName === 'INTEREST')
                            {{-- new code  --}}
                            @php
                                // Prepare total for percentage if needed, though we'll show raw average as requested
                                    $total = collect($sections['chart'])->sum('average_value');

                                    // Fallback to avoid divide by zero
                                    if ($total <= 0) {
                                        $total = 1;
                                    }

                                    // Colors similar to Canva (matching AssessmentController)
                                    $colors = [
                                        '#facc15', // yellow
                                       '#fb923c', // orange
                                        '#ef4444', // red
                                        '#ec4899', // pink
                                        '#a855f7', // purple
                                        '#6366f1', // blue
                                ];
                            @endphp
                            <div class="donut-wrap">

                                <div class="donut-left">
                                    <div style="text-align:center; margin: 20px 0;">
                                        <img src="{{ asset('temp/donut-' . $student->id . '.png') }}"
                                            style="width:320px; height:320px;">
                                    </div>
                                </div>

                                <div class="donut-right">
                                    @foreach ($sections['chart'] as $i => $sec)
                                        @php
                                            $color = $colors[$i % count($colors)];
                                        @endphp
                                        <div class="donut-legend-item"
                                            style="font-size: 16px; margin-bottom: 8px; line-height: 50px;">
                                            <span class="donut-dot"
                                                style="background: {{ $color }}; width:12px; height:12px;"></span>
                                            <span
                                                style="font-weight: 800; color: #333;">{{ $sec['average_value'] }}</span>
                                            <span>{{ $sec['section_name'] }}</span>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @elseif ($domainDisplayName === 'PERSONALITY')
                        @php
                        $colors = [
                            'Openness' => '#fb923c',
                            'Agreeableness' => '#ef4444',
                            'Conscientiousness' => '#ec4899',
                            'Extraversion' => '#a855f7',
                            'Neuroticism' => '#6366f1',
                        ];
                        @endphp
                        
                        <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:40px;">
                            <tr>
                                <!-- LEFT: MAIN NODE -->
                                <td width="35%" align="center" valign="middle" style="border:none;">
                                    <div style="
                                        background:#9ca3af;
                                        color:#fff;
                                        padding:10px 18px;
                                        border-radius:18px;
                                        font-weight:800;
                                        font-size:14px;
                                        display:inline-block;
                                    ">
                                        PERSONALITY
                                    </div>
                                </td>
                        
                                <!-- CONNECTOR COLUMN -->
                                <td width="10%" valign="middle" style="border:none;">
                                    <div style="border-left:2px solid #555; height:220px; margin:auto;"></div>
                                </td>
                        
                                <!-- RIGHT: TRAITS -->
                                <td width="55%" style="border:none;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        @foreach ($sections['chart'] as $sec)
                                            @php
                                                $color = $colors[$sec['section_name']] ?? '#666';
                                            @endphp
                                            <tr>
                                                <!-- horizontal line -->
                                                <td width="30" style="border:none;">
                                                    <div style="border-top:2px solid #555; height:1px;"></div>
                                                </td>
                        
                                                <!-- pill -->
                                                <td style="border:none; padding-bottom:14px;">
                                                    <div style="
                                                        background: {{ $color }};
                                                        color:#fff;
                                                        padding:8px 14px;
                                                        border-radius:16px;
                                                        font-size:12px;
                                                        font-weight:700;
                                                        display:inline-block;
                                                        min-width:220px;
                                                    ">
                                                        {{ $sec['section_name'] }}
                                                        <span style="
                                                            background: rgba(255,255,255,0.25);
                                                            padding:4px 8px;
                                                            border-radius:10px;
                                                            margin-left:10px;
                                                            font-size:11px;
                                                        ">
                                                            Score: {{ $sec['average_value'] }}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        </table>
                        @else
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
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <div class="page-break"></div>

    <div class="pdf-page ">
        <div class="h2-banner">
            <h2 class="h2-title">Integrated Analysis</h2>
        </div>
        <p>{{ $student->name }} demonstrates high emotional stability, creativity, conscientiousness, and social
            engagement. His preference for autonomy and long-term orientation aligns well with careers requiring deep
            engagement and self-direction.</p>
    </div>
    <div class="page-break"></div>
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
    <div class="page-break"></div>
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
    <div class="page-break"></div>
    <div class="pdf-page">
        <div class="meta">
            <div class="h2-banner">
                <h2 class="h2-title">Counselor's Remarks</h2>
            </div>
            <p>{{ $student->name }} exhibits a balanced and mature personality marked by self-awareness
                and goal clarity. With strong cognitive strengths and humanistic values, {{ $student->name }} can grow
                into
                leadership roles in fields that demand both intellect and empathy. Encouraging exploratory learning and
                mentorship will enrich this trajectory.</p>
        </div>

        <div class="meta">
            <p>Signature</p>
            <p>XYZ</p>
            <p>Career Counsellor</p>
        </div>
    </div>
    <div class="page-break"></div>
</body>

</html>
