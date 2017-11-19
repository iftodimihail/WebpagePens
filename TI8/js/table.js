var nrOfCols = 0;
var nrOfRows = 0;
var table = document.getElementById("myTable");

function insertRow(){
	var cells=[];
	var rowIndex = document.getElementById("index").value;
	var newRow;
	if(rowIndex-1 <= nrOfRows && rowIndex > 0){
		if(nrOfRows === 0){
			newRow = table.insertRow(0);
			newRow.insertCell(0);
			nrOfCols++;
			nrOfRows++;
			newRow.style.backgroundColor = document.getElementById("cellColor").value;
		}
		else{
			newRow = table.insertRow(rowIndex-1);
			for(var i=0; i<nrOfCols;i++){
				cells[i] = newRow.insertCell(i);
				newRow.style.backgroundColor = document.getElementById("cellColor").value;
			}
		nrOfRows++;
		}
	}else alert("Nu se poate introduce la acest index");
}

function insertCol(){
	var colIndex = document.getElementById("index").value;
	var rowList = document.getElementsByTagName("tr");
	var table = document.getElementById("myTable");
	if(colIndex-1 <= nrOfCols && colIndex > 0){
		if(nrOfRows === 0){
			var newRow = table.insertRow(0);
			newRow.insertCell(0);
			nrOfCols++;
			nrOfRows++;
			newRow.style.backgroundColor = document.getElementById("cellColor").value;
		}
		else{
			for(var i=0; i<nrOfRows;i++){
				rowList[i].insertCell(colIndex-1);
				rowList[i].cells[colIndex-1].style.backgroundColor = document.getElementById("cellColor").value;
			}
			nrOfCols++;
		}
	}else alert("Nu se poate introduce la acest index");
}


/*
var nrOfCols = 2;
var nrOfRows = 1;
function insertRow(){
	var rowIndex = document.getElementById("row").value;
	var row = document.createElement("tr");
	for(var i=0; i<=rowIndex;i++)
		
	row.style.backgroundColor="red";
	for(var i=0; i<nrOfCols;i++){
		row.insertCell(i);
		nrOfRows++;
	}
	var table = document.getElementById("myTable");
	table.appendChild(row);
}*/