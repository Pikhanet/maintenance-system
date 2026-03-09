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
            width: 1400px;
            margin: 40px auto;
        }

        .title {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .section-title {
            background: #ddd8cf;
            color: #000;
            font-weight: bold;
            padding: 8px 12px;
            margin: 30px 0 0 0;
            border: 1px solid #999;
        }

        .plan-row {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #555;
            padding: 12px 0;
            min-height: 46px;
        }

        .item-name {
            width: 420px;
            padding-left: 10px;
            color: #fff;
            font-size: 18px;
        }

        .plan-code {
            width: 180px;
            background: #eee;
            color: #222;
            text-align: center;
            padding: 8px 0;
            font-size: 24px;
            border: 1px solid #ccc;
            margin-right: 30px;
        }

        .circle-group {
            display: flex;
            gap: 12px;
            margin-left: auto;
            margin-right: 20px;
        }

        .circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid #888;
            background: #666;
            cursor: pointer;
            transition: 0.2s;
            box-sizing: border-box;
        }

        .circle.done {
            background: #fff;
            border-color: #fff;
        }

        .month-header {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-bottom: 10px;
            margin-right: 20px;
            color: #fff;
            font-size: 14px;
        }

        .month-header span {
            width: 28px;
            text-align: center;
        }

        .note {
            margin-top: 30px;
            font-size: 16px;
            color: #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">Maintenance Plan</div>

    <div class="month-header">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>
        <span>6</span>
        <span>7</span>
        <span>8</span>
        <span>9</span>
        <span>10</span>
        <span>11</span>
        <span>12</span>
    </div>

    <div class="section-title">1. DAILY CHECK</div>

    <div class="plan-row">
        <div class="item-name">ตรวจเช็กรายการประจำวัน</div>
        <div class="plan-code">FRM-E-001</div>
        <div class="circle-group">
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
        </div>
    </div>

    <div class="plan-row">
        <div class="item-name">ตรวจเช็กแรงดันลม</div>
        <div class="plan-code">FRM-E-002</div>
        <div class="circle-group">
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
        </div>
    </div>

    <div class="plan-row">
        <div class="item-name">ตรวจเช็ก Sensor</div>
        <div class="plan-code">FRM-E-017</div>
        <div class="circle-group">
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
        </div>
    </div>

    <div class="section-title">2. WEEKLY CHECK</div>

    <div class="plan-row">
        <div class="item-name">ตรวจเช็กชุดขับเคลื่อนประจำสัปดาห์</div>
        <div class="plan-code">FRM-E-025</div>
        <div class="circle-group">
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
        </div>
    </div>

    <div class="plan-row">
        <div class="item-name">ตรวจเช็กระบบหล่อลื่นประจำสัปดาห์</div>
        <div class="plan-code">FRM-E-027</div>
        <div class="circle-group">
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
            <div class="circle" onclick="toggleCircle(this)"></div>
        </div>
    </div>

    <div class="note">
        คลิกที่วงกลมเพื่อเปลี่ยนสถานะ: สีเทา = ยังไม่ทำ, สีขาว = ทำแล้ว
    </div>
</div>

<script>
    function toggleCircle(element) {
        element.classList.toggle('done');
    }
</script>

</body>
</html>