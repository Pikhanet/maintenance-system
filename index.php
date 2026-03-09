<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Maintenance Plan</title>

<style>

body{
font-family:Arial;
background:white;
margin:0;
padding:20px;
}

.toolbar{
margin-bottom:15px;
}

button{
padding:8px 14px;
margin-right:5px;
cursor:pointer;
font-weight:bold;
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
background:#eee;
position:sticky;
top:0;
}

.monthHeader{
background:white;
font-weight:bold;
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

input[type=text]{
width:100%;
border:0;
outline:none;
}

.periodBox{
display:flex;
gap:5px;
justify-content:center;
}

.selected{
background:#d8ecff;
}

@media print{

button{
display:none;
}

}

</style>

</head>

<body>

<h2>Maintenance Plan</h2>

<div class="toolbar">

<button onclick="addRow()">Add Row</button>
<button onclick="deleteRow()">Delete Row</button>
<button onclick="saveData()">Save</button>
<button onclick="window.print()">Print</button>

</div>

<table id="table">

<thead>

<tr>
<th rowspan="2">NO</th>
<th rowspan="2">RUN</th>
<th rowspan="2">STOP</th>
<th rowspan="2">PERIOD</th>
<th rowspan="2">CH.SHEET</th>
<th rowspan="2">INCHARGE</th>
<th rowspan="2">MxH</th>
<th rowspan="2">LINE</th>
<th rowspan="2">NAME</th>
<th rowspan="2">FRM</th>
<th colspan="12">Month</th>
</tr>

<tr class="monthHeader">
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

<tbody id="tableBody">
</tbody>

</table>

<script>

let selectedRow=null

function createMonth(){

let html=""

for(let i=1;i<=12;i++){

html+=`<td>
<div class="circle" onclick="toggleCircle(this)"></div>
</td>`

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

row.onclick=function(){
selectRow(row)
}

row.innerHTML=`

<td class="no"></td>

<td><input type="checkbox"></td>

<td><input type="checkbox"></td>

<td>${createPeriod()}</td>

<td><input type="text"></td>

<td><input type="text"></td>

<td><input type="text"></td>

<td><input type="text"></td>

<td><input type="text"></td>

<td><input type="text"></td>

${createMonth()}

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

let rows=document.querySelectorAll("#tableBody tr")

let data=[]

rows.forEach(r=>{

let obj={}

obj.name=r.cells[8].innerText

data.push(obj)

})

localStorage.setItem("maintenance",JSON.stringify(data))

alert("Saved")

}

addRow()

</script>

</body>
</html>