<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <style>

        body{
            font-family: DejaVu Sans;
            background:#f1f5f9;
            padding:15px;
            color:#0f172a;
            font-size:12px;
        }

        /* MAIN */

        .wrapper{

            background:white;

            padding:18px;

            border-radius:12px;

            border:1px solid #e2e8f0;

        }

        /* HEADER */

        .headerTable{

            width:100%;

            border-bottom:2px solid #e2e8f0;

            padding-bottom:10px;

            margin-bottom:15px;

        }

        .logo{

            width:90px;

        }

        .reportTitle{

            font-size:20px;

            font-weight:bold;

            color:#4f46e5;

            text-align:center;

        }

        .reportSub{

            font-size:11px;

            color:#64748b;

            text-align:center;

            margin-top:3px;

        }

        .reportInfo{

            font-size:10px;

            text-align:right;

            color:#64748b;

        }

        /* SCORE */

        .scoreCard{

            text-align:center;

            margin-bottom:10px;

            padding:10px;

            background:#f8fafc;

            border-radius:10px;

        }

        .score{

            font-size:30px;

            font-weight:bold;

            color:#4f46e5;

        }

        .scoreText{

            color:#64748b;

            font-size:11px;

        }

        .progress{

            height:8px;

            background:#e2e8f0;

            border-radius:20px;

            margin-top:6px;

        }

        .bar{

            height:8px;

            border-radius:20px;

            background:#6366f1;

        }

        .badge{

            display:inline-block;

            margin-top:6px;

            padding:4px 12px;

            border-radius:20px;

            background:#eef2ff;

            color:#4f46e5;

            font-weight:bold;

            font-size:10px;

        }

        /* MESSAGE */

        .message{

            margin-top:10px;

            background:#eef2ff;

            padding:10px;

            border-radius:8px;

            text-align:center;

            font-size:11px;

        }

        /* SECTION */

        .divider{

            font-size:15px;

            font-weight:bold;

            margin-top:15px;

            margin-bottom:6px;

        }

        /* TOPICS */

        .topicTable{

            width:100%;

            border-spacing:8px;

        }

        .topicCard{

            border:1px solid #e2e8f0;

            border-radius:10px;

            padding:12px;

            background:white;

        }

        /* TITLE */

        .topicTitle{

            font-weight:bold;

            font-size:12px;

            margin-bottom:4px;

        }

        /* PERCENT */

        .topicScore{

            float:right;

            font-weight:bold;

            padding:3px 8px;

            border-radius:20px;

            font-size:10px;

            color:white;

        }

        /* COLORS */

        .blue{background:#3b82f6;}
        .green{background:#10b981;}
        .purple{background:#8b5cf6;}
        .orange{background:#f59e0b;}
        .pink{background:#ec4899;}
        .cyan{background:#06b6d4;}
        .red{background:#ef4444;}
        .indigo{background:#6366f1;}

        /* PROGRESS */

        .topicProgress{

            height:6px;

            background:#e2e8f0;

            border-radius:20px;

            margin-top:5px;

        }

        .topicBar{

            height:6px;

            border-radius:20px;

        }

        /* LEVEL */

        .level{

            font-size:11px;

            margin-top:4px;

        }

        /* TIP */

        .tip{

            background:#f8fafc;

            padding:6px;

            border-radius:6px;

            margin-top:6px;

            font-size:10px;

            color:#475569;

            border-left:3px solid #6366f1;

        }

        /* IKIGAI */

        .ikigai{

            background:#f1f5f9;

            padding:12px;

            border-radius:8px;

            text-align:center;

            margin-top:10px;

        }

        .ikigaiTitle{

            font-weight:bold;

            font-size:13px;

            color:#7c3aed;

        }

        /* NOTE */

        .note{

            background:#fff7ed;

            padding:10px;

            border-radius:8px;

            margin-top:10px;

            font-size:10px;

            border:1px solid #fed7aa;

        }

        /* FOOTER */

        .footer{

            margin-top:18px;

            border-top:1px solid #e2e8f0;

            padding-top:10px;

            font-size:10px;

            color:#64748b;

        }

        .footerLeft{

            text-align:left;

        }

        .footerRight{

            text-align:right;

            color:#94a3b8;

        }

        .reportInfo{

            text-align:right;

            font-size:11px;

        }

        .infoRow{

            margin-bottom:4px;

        }

        .infoLabel{

            color:#64748b;

        }

        .infoValue{

            color:#0f172a;

            font-weight:bold;

            margin-left:4px;

        }

    </style>

</head>

<body>

@php

    $file = resource_path('views/assessment/result-partials/text.blade.php');

    $levelMap=[];
    $topicTips=[];

    if(file_exists($file)){
    include $file;
    }

$total = 180;

$score = (int) ($assessment->overall_score ?? 0);

$percentage = $total > 0
    ? round(($score / $total) * 100)
    : 0;

/* prevent invalid values */
$percentage = max(0, min(100, $percentage));

$topics = is_array($assessment->topic_scores)
    ? $assessment->topic_scores
    : json_decode($assessment->topic_scores, true);

$ui = $levelMap[$assessment->overall_level] ?? $levelMap['Good'];

$colors = [
    'blue','green','purple','orange',
    'pink','cyan','red','indigo'
];

$c = 0;

@endphp

<div class="wrapper">

    <!-- HEADER -->
    <table class="headerTable">

        <tr>

            <td width="25%">

                <img src="{{ public_path('images/logo.png') }}"
                     class="logo">

            </td>

            <td width="50%">

                <div class="reportTitle">
                    PERSONAL ASSESSMENT REPORT
                </div>

                <div class="reportSub">
                    CONFIDENTIAL WELLBEING ANALYSIS
                </div>

            </td>

            <td width="25%" class="reportInfo">

                <div class="infoRow">
                    <span class="infoLabel">Name :</span>
                    <span class="infoValue">{{ auth()->user()->name ?? '-' }}</span>
                </div>

                <div class="infoRow">
                    <span class="infoLabel">Date :</span>
                    <span class="infoValue">{{ now()->format('d M Y') }}</span>
                </div>

                <div class="infoRow">
                    <span class="infoLabel">Level :</span>
                    <span class="infoValue">{{ $assessment->overall_level }}</span>
                </div>

            </td>

        </tr>

    </table>

    <!-- SCORE -->

    <div class="scoreCard">

        <div class="score">
            {{ $percentage }}%
        </div>

        <div class="scoreText">
            Overall Score : {{ $score }} / {{ $total }}
        </div>

        <table class="progress" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="{{ $percentage }}%" class="bar"></td>
                <td width="{{ 100-$percentage }}%"></td>
            </tr>
        </table>

        <div class="badge">
            Overall Level : {{ $assessment->overall_level }}
        </div>

    </div>

    <div class="message">

        {{ $ui['message'] ?? 'Your responses reflect your growth journey.' }}

    </div>

    <div class="divider">

        Growth Dimension Analysis

    </div>

    <table class="topicTable">

        <tr>

            @php $i=0; @endphp

            @foreach($topics as $topic=>$data)

                @if($topic!='ikigai')

                    @php

                        $color=$colors[$c%8];

                        $c++;

                    @endphp

                    <td width="50%">

                        <div class="topicCard">

                            <div class="topicTitle">

                                {{ ucwords(str_replace('_',' ',$topic)) }}

                                <span class="topicScore {{ $color }}">
{{ $data['percentage'] }}%
</span>

                            </div>

                            <div class="level">
                                Level : <b>{{ $data['level'] }}</b>
                            </div>

                            <div class="topicProgress">

                                <div class="topicBar {{ $color }}"
                                     style="width:{{ $data['percentage'] }}%">
                                </div>

                            </div>

                            <div class="tip">

                                {{ $topicTips[$topic][$data['level']]
                                ?? 'Small improvements create meaningful growth.' }}

                            </div>

                        </div>

                    </td>

                    @php

                        $i++;

                        if($i%2==0)
                        echo "</tr><tr>";

                    @endphp

                @endif

            @endforeach

        </tr>

    </table>

    @if(isset($topics['ikigai']))

        <div class="ikigai">

            <div class="ikigaiTitle">
                Ikigai Purpose Insight
            </div>

            <p>

                Your purpose grows where passion,
                skill, impact and joy intersect.

            </p>

        </div>

    @endif

    <div class="note">

        This assessment is a self-reflection tool and
        not a medical diagnosis.

    </div>

    <div class="footer">

        <table width="100%">

            <tr>

                <td class="footerLeft">

                    Confidential Personal Growth Report

                </td>

                <td class="footerRight">

                    © {{ date('Y') }} OneLastTry
                    <br>
                    All Rights Reserved

                </td>

            </tr>

        </table>

    </div>

</div>

</body>

</html>
