<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Maintenance Plan</title>
<style>
    body{
        background:black;
        color:white;
        font-family:Arial, sans-serif;
        margin:0;
    }

    .container{
        width:1850px;
        margin:30px auto;
    }

    h1{
        margin-bottom:20px;
    }

    .toolbar{
        margin-bottom:15px;
        display:flex;
        gap:10px;
    }

    .toolbar button{
        padding:10px 18px;
        font-size:16px;
        cursor:pointer;
        border:none;
        border-radius:4px;
    }

    .btn-add{
        background:#2d7ef7;
        color:white;
    }

    .btn-save{
        background:#2ea043;
        color:white;
    }

    .btn-load{
        background:#666;
        color:white;
    }

    .plan-row{
        display:grid;
        grid-template-columns:
            60px
            70px
            70px
            260px
            150px
            120px
            80px
            120px
            320px
            150px
            auto;
        align-items:center;
        border-bottom:1px dotted #555;
        padding:8px 0;
        column-gap:8px;
    }

    .header{
        background:#eee;
        color:black;
        font-weight:bold;
        padding:10px 0;
    }

    .period-box{
        display:flex;
        gap:8px;
        flex-wrap:wrap;
        font-size:14px;
    }

    .period-box label{
        white-space:nowrap;
    }

    .circle-group{
        display:flex;
        gap:10px;
        align-items:center;
    }

    .circle{
        width:22px;
        height:22px;
        border-radius:50%;
        border:2px solid #777;
        background:#666;
        cursor:pointer;
        box-sizing:border-box;
    }

    .circle.done{
        background:white;
        border-color:white;
    }

    .month-header{
        display:flex;
        gap:10px;
    }

    .month-header span{
        width:22px;
        height:22px;
        text-align:center;
        line-height:22px;
        background:white;
        color:black;
        font-weight:bold;
        border-radius:4px;
        font-size:12px;
    }

    .plan-code{
        background:#eee;
        color:black;
        text-align:center;
        padding:4px;
        border:1px solid #ccc;
    }

    input[type="text"],
    input[type="number"]{
        width:95%;
        padding:6px;
        box-sizing:border-box;
        font-size:14px;
    }

    .center{
        text-align:center;
    }

    .msg{
        margin-top:15px;
        color:#9be79b;
        font-size:15px;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Maintenance Plan</h1>

    <div class="toolbar">
        <button class="btn-add" onclick="addRow()">Add Row</button>
        <button class="btn-save" onclick="saveData()">Save</button>
        <button class="btn-load" onclick="loadData()">Load</button>
    </div>

    <div class="plan-row header">
        <div>NO</div>
        <div>RUN</div>
        <div>STOP</div>
        <div>PERIOD OF CHECK</div>
        <div>CH.SHEET NO.</div>
        <div>INCHARGE</div>
        <div>MxH</div>
        <div>LINE</div>
        <div>NAME & TYPE OF MACHINE</div>
        <div>FRM CODE</div>
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
    </div>

    <div id="tableBody"></div>

    <div id="message" class="msg"></div>
</div>

<script>
    function createCircleGroup(selectedMonths = []) {
        let html = '<div class="circle-group">';
        for (let i = 1; i <= 12; i++) {
            const doneClass = selectedMonths.includes(i) ? 'done' : '';
            html += `<div class="circle ${doneClass}" data-month="${i}" onclick="toggleCircle(this)"></div>`;
        }
        html += '</div>';
        return html;
    }

    function createPeriodBox(selected = '') {
        const options = ['1/4', '1', '3', '4', '6', '12'];
        let html = '<div class="period-box">';
        options.forEach(opt => {
            const checked = selected === opt ? 'checked' : '';
            html += `<label><input type="radio" name="" value="${opt}" ${checked}> ${opt}</label>`;
        });
        html += '</div>';
        return html;
    }

    function renumberRows() {
        const rows = document.querySelectorAll('.data-row');
        rows.forEach((row, index) => {
            row.querySelector('.row-no').textContent = index + 1;
            const radios = row.querySelectorAll('.period-box input[type="radio"]');
            const groupName = 'period_' + (index + 1);
            radios.forEach(r => r.name = groupName);
        });
    }

    function addRow(data = null) {
        const tableBody = document.getElementById('tableBody');
        const row = document.createElement('div');
        row.className = 'plan-row data-row';

        row.innerHTML = `
            <div class="row-no center"></div>
            <div class="center"><input type="checkbox" class="run-check" ${data?.run ? 'checked' : ''}></div>
            <div class="center"><input type="checkbox" class="stop-check" ${data?.stop ? 'checked' : ''}></div>
            <div>${createPeriodBox(data?.period || '')}</div>
            <div><input type="text" class="chsheet" value="${data?.chsheet || ''}"></div>
            <div><input type="text" class="incharge" value="${data?.incharge || ''}"></div>
            <div><input type="number" step="0.1" class="mxh" value="${data?.mxh || ''}"></div>
            <div><input type="text" class="line" value="${data?.line || ''}"></div>
            <div><input type="text" class="machine-name" value="${data?.machineName || ''}"></div>
            <div><input type="text" class="frm-code" value="${data?.frmCode || ''}"></div>
            <div>${createCircleGroup(data?.months || [])}</div>
        `;

        tableBody.appendChild(row);
        renumberRows();
    }

    function toggleCircle(el) {
        el.classList.toggle('done');
    }

    function saveData() {
        const rows = document.querySelectorAll('.data-row');
        const data = [];

        rows.forEach(row => {
            const selectedRadio = row.querySelector('.period-box input[type="radio"]:checked');
            const months = [];
            row.querySelectorAll('.circle').forEach(circle => {
                if (circle.classList.contains('done')) {
                    months.push(parseInt(circle.dataset.month));
                }
            });

            data.push({
                run: row.querySelector('.run-check').checked,
                stop: row.querySelector('.stop-check').checked,
                period: selectedRadio ? selectedRadio.value : '',
                chsheet: row.querySelector('.chsheet').value,
                incharge: row.querySelector('.incharge').value,
                mxh: row.querySelector('.mxh').value,
                line: row.querySelector('.line').value,
                machineName: row.querySelector('.machine-name').value,
                frmCode: row.querySelector('.frm-code').value,
                months: months
            });
        });

        localStorage.setItem('maintenance_plan_data', JSON.stringify(data));
        showMessage('บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    function loadData() {
        const saved = localStorage.getItem('maintenance_plan_data');
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        if (saved) {
            const data = JSON.parse(saved);
            data.forEach(item => addRow(item));
            showMessage('โหลดข้อมูลเรียบร้อยแล้ว');
        } else {
            showMessage('ยังไม่มีข้อมูลที่บันทึกไว้');
        }
    }

    function showMessage(text) {
        const msg = document.getElementById('message');
        msg.textContent = text;
        setTimeout(() => {
            msg.textContent = '';
        }, 3000);
    }

    window.onload = function() {
        loadData();
        const rowCount = document.querySelectorAll('.data-row').length;
        if (rowCount === 0) {
            addRow({
                run: true,
                stop: false,
                period: '1/4',
                chsheet: 'FRM-E-001',
                incharge: 'Worker',
                mxh: '0.5',
                line: 'FRAME',
                machineName: 'ตรวจเช็กรายการประจำวัน',
                frmCode: 'FRM-E-001',
                months: [3,4,5]
            });
        }
    };
</script>

</body>
</html>