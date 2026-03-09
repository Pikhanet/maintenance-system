<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Plan</title>
    <style>
        body {
            margin: 0;
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 1200px;
            margin: 40px auto;
        }

        .plan-row {
            display: flex;
            align-items: center;
            border-top: 1px solid #666;
            border-bottom: 1px solid #666;
            padding: 14px 0;
        }

        .plan-code {
            width: 180px;
            margin-left: 250px;
            background: #eee;
            color: #222;
            text-align: center;
            padding: 8px 0;
            font-size: 28px;
            border: 1px solid #ccc;
        }

        .circle-group {
            display: flex;
            gap: 14px;
            margin-left: auto;
            margin-right: 40px;
        }

        .circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid #999;
            box-sizing: border-box;
        }

        .circle.done {
            background: #fff;
            border-color: #fff;
        }

        .circle.pending {
            background: #666;
            border-color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="plan-row">
            <div class="plan-code">FRM-E-001</div>

            <div class="circle-group">
                <div class="circle pending"></div>
                <div class="circle pending"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
                <div class="circle done"></div>
            </div>
        </div>
    </div>
</body>
</html>