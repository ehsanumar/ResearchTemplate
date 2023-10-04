<?php
$students = explode(",", $research->student_name);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .footer {
            text-align: center;
            position: fixed;
            bottom: 20px;
            left: 0;
            right: 0;
            padding-top: 80px;
        }

        .page-number:before {
            content: counter(page);
        }

        h2 {
            text-align: center;
        }

        h4 {
            color: #5aaaec;
        }

        p {
            font-size: 12px;
            padding-left: 15px;
            line-height: 2;
            text-align: justify;
        }



    </style>
</head>

<body style="  font-family: Arial, sans-serif; margin: 30px;  ">
    <div style="">
        <img src="{{ public_path('image/logo1.png') }}" alt=""
            style="width: 100px; padding-right:5px; float:left;">
        <h1 style=" font-size: 22px;">Soran University <br>
            facualty Of {{ $research->faculty->faculty }} <br>
            {{ $research->department->department }} Department
        </h1>

    </div>

    <div style=" text-align: center;  margin-top: 100px;">
        <h1 style="color:#5aaaec;">Title: </h1>
        <h4 style="font-weight: 100;">
            {{ $research->title }}
        </h4>
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 100px; margin-bottom: 20px;">
        <div style="width: 100%; font-size: 25px;">
            <div style="float: left; width: 50%; font-weight: bold;">Prepared by</div>
            <div style="float: right; width: 50%; text-align: right; font-weight: bold;">Supervised By</div>
            <div style="clear: both;"></div> <!-- Clear the floats -->
        </div>
        <div style="width: 100%; font-size: 19px;">
            <div style="float: left; width: 50%;">
            @foreach ($students as $student)
{{ $loop->iteration }} - {{ $student }} <br>
            @endforeach
            </div>
            <div style="float: right; width: 50%; text-align: right; padding-right:35px;">1-
                MR. {{ $research->teacher->name }}
            </div>
            <div style="clear: both;"></div> <!-- Clear the floats -->
        </div>

    </div>

    <div
        style=" margin-bottom: 30px; font-size:14px; font-family: 'Times New Roman', Times, serif; page-break-before:always; padding: 0 50px">
        <h4 style="color:#5aaaec;">Abstract:</h4>
        <p style="font-size: 12px; padding-left:15px; line-height: 1.6;">
            {{ $research->abstract }}
        </p>
    </div>
    <div style=" margin-bottom: 20px; font-size:14px; font-family: 'Times New Roman', Times, serif; padding: 0 50px">
        <h4 style="color:#5aaaec;">Keyword:</h4>
        <p style="font-size: 12px; padding-left:15px; line-height: 1.6;">
            {{ $research->keyword }}
        </p>
    </div>
    {{-- <div style=" margin-bottom: 35px; font-size:14px; font-family: 'Times New Roman', Times, serif; padding: 0 50px">
        <h4 style="color:#5aaaec;">Content:</h4>
        <p style="font-size: 12px; padding-left:15px; line-height: 1.6;">
        </p>
    </div> --}}

        <div >
<p style="text-align: justify;">

    {!! $research->content !!}
</p>

    </div>
    <div style=" margin-bottom: 45px; font-size:14px; font-family: 'Times New Roman', Times, serif; padding: 0 50px">
        <h4 style="color:#5aaaec;">Refrence:</h4>
            <a style="font-size: 14px; padding-left:15px; line-height: 1.6; text-decoration: underline; color:#279EFF;">
                {{-- {{ $loop->iteration }} -  --}}
                {!!$research->refrence !!}
            </a>
            <br>
    </div>


    <?php
    // Add the following code to create a page break and margin before the footer
    if (isset($pdf)) {
        $pdf->AddPage(); // Add a new page
        $font = $fontMetrics->get_font('Arial, sans-serif', 'normal');
        $size =2;
        $pdf->page_text(270, 770, 'Page: {PAGE_NUM}', $font, $size);
    }
    ?>
    <div class="footer" style="margin-top: 20px;">
        <hr>
        Page <span class="page-number"></span>
    </div>


</body>

</html>
