<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Maintenance Check Sheet</title>

<style>

body{
font-family:Arial;
background:white;
margin:0;
padding:20px;
}

h1{
margin-bottom:10px;
}

.toolbar{
margin-bottom:15px;
}

button{
padding:8px 14px;
margin-right:5px;
font-weight:bold;
cursor:pointer;
}

table{
width:100%;
border-collapse:collapse;
}

th,td{
border:1px solid black;
padding:6px;
text-align:center;
}

thead th{
background:#ddd;
position:sticky;
top:0;
z-index:2;
}

.monthHead{
background:#fff;
font-weight:bold;
}

.nameCell{
text-align:left;
}

.circle{
width:18px;
height:18px;
border-radius:50%;
border:2px solid #666;
background:#bbb;
margin:auto;
cursor:pointer;
}

.circle.done{
background:black;
}

.periodBox{
display:flex;
gap:6px;
justify-content:center;
}

.selected{
background:#d7ecff;
}

input[type=text]{
width:100%;
border:0;
outline:none;
}

.headerBox{
border:1px solid black;
padding:8px;
margin-bottom:10px;
}

.headerRow{
display:flex;
gap:20px;
margin-bottom:4px;
}

@media print{

button{
display:none;
}

}

</style>

</head>

<body>

<h1>Maintenance Plan</h1>

<div class="toolbar">
<button onclick="addRow()">Add Row</button>
<button onclick="deleteRow()">Delete Row</button>
<button onclick="saveData()">Save</button>
<button onclick="window.print()">Print</button>
</div>

<div class="headerBox">

<div class="headerRow">
<div><b>NAME & TYPE OF MACHINE :</b> Frame Line</div>
</div>

<div class="headerRow">
<div><b>LINE :</b> FRAME</div>
<div><b>REVISION :</b> 01</div>
</div>

</div>

<table id="table">

<thead>

<tr>
<th rowspan="2">NO</th>
<th rowspan="2">RUN</th>
<th rowspan="2">STOP</th>
<th rowspan="2">PERIOD</th>
<th rowspan="2">CHECK SHEET</th>
<th rowspan="2">INCHARGE</th>
<th rowspan="2">MxH</th>
<th rowspan="2">LINE</th>
<th rowspan="2">NAME</th>
<th colspan="12">Month</th>
</tr>

<tr class="monthHead">
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th>
<th>6</th>
<th>7</th>
<th>8</th>
<th>9</th>
<th>10</th>
<th>11</th>
<th>12</th>
</tr>

</thead>

<tbody id="tableBody"></tbody>

</table>

<script>

let selectedRow=null

function createMonths(){

let html=""

for(let i=1;i<=12;i++){

html+=`<td><div class="circle" onclick="toggleCircle(this)"></div></td>`

}

return html

}

function createPeriod(){

return `

<div class="periodBox">

<label><input type="radio">1/4</label>
<label><input type="radio">1</label>
<label><input type="radio">3</label>
<label><input type="radio">4</label>
<label><input type="radio">6</label>
<label><input type="radio">12</label>

</div>

`

}

function addRow(){

let table=document.getElementById("tableBody")

let row=document.createElement("tr")

row.onclick=function(){selectRow(row)}

row.innerHTML=`

<td class="no"></td>

<td><input type="radio" name="runstop"></td>

<td><input type="radio" name="runstop"></td>

<td>${createPeriod()}</td>

<td><input type="text"></td>

<td><input type="text"></td>

<td><input type="text"></td>

<td><input type="text"></td>

<td class="nameCell"><input type="text"></td>

${createMonths()}

`

table.appendChild(row)

renumber()

}

function selectRow(row){

let rows=document.querySelectorAll("#tableBody tr")

rows.forEach(r=>r.classList.remove("selected"))

row.classList.add("selected")

selectedRow=row

}

function deleteRow(){

if(selectedRow){

selectedRow.remove()

selectedRow=null

renumber()

}

}

function renumber(){

let rows=document.querySelectorAll("#tableBody tr")

rows.forEach((r,i)=>{

r.querySelector(".no").innerText=i+1

})

}

function toggleCircle(el){

el.classList.toggle("done")

}

function saveData(){

alert("Saved")

}

addRow()

</script>

</body>
</html>