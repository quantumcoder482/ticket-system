<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Receipt</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.2.3/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>@page { size: A5 landscape }</style>

    <!-- Custom styles for this document -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
    <style>
        body   { font-family: serif }
        h1     { font-family: 'Tangerine', cursive; font-size: 40pt; line-height: 18mm}
        h2, h3 { font-family: 'Tangerine', cursive; font-size: 24pt; line-height: 7mm }
        h4     { font-size: 32pt; line-height: 14mm }
        h2 + p { font-size: 18pt; line-height: 7mm }
        h3 + p { font-size: 14pt; line-height: 7mm }
        li     { font-size: 11pt; line-height: 5mm }
        h1      { margin: 0 }
        h1 + ul { margin: 2mm 0 5mm }
        h2, h3  { margin: 0 3mm 3mm 0; float: left }
        h2 + p,
        h3 + p  { margin: 0 0 3mm 50mm }
        h4      { margin: 2mm 0 0 50mm; border-bottom: 2px solid black }
        h4 + ul { margin: 5mm 0 0 50mm }
        article { border: 2px dotted black; padding: 5mm 10mm;  }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A5 landscape">

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet padding-20mm">


    <article>

        <table style="width:100%">

            <tr>
                <td align="left">Receipt # 38904</td>
                <td align="right">Date: 27/08/2017</td>

            </tr>

        </table>

        <hr>

        <h2>Received from:</h2>
        <p>John Doe</p>

        <h3>For:</h3>
        <p>Coworking-space fee</p>

        <h4>&yen; 1,000-</h4>
        <ul>
            <li>Tax: included</li>
            <li>Paid by: cash</li>
            <li>No. 00000</li>
            <li>Oct 10, 2015</li>
        </ul>
        <hr>
    </article>

</section>

</body>

</html>