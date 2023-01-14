/*live date and time*/
window.onload = setInterval(clock,1000);
    
        function clock()
        {
          var d = new Date();
          
          var date = d.getDate();
          
          var month = d.getMonth();
          var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
          month=montharr[month];
          
          var year = d.getFullYear();
          
          var day = d.getDay();
          var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
          day=dayarr[day];
          
          var hour =d.getHours();
          var min = d.getMinutes();
          var sec = d.getSeconds();
        
          document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
          document.getElementById("time").innerHTML=hour + ":" + min + ":" + sec;
        }

/*prescription*/
var selectedRow = null

function onFormSubmit(e) {
	event.preventDefault();
        var formData = readFormData();
        if (selectedRow == null){
            insertNewRecord(formData);
		}
        else{
            updateRecord(formData);
		}
        resetForm();    
}

//Retrieve the data
function readFormData() {
    var formData = {};
    formData["DrugName"] = document.getElementById("DrugName").value;
    formData["Dosage"] = document.getElementById("Dosage").value;
    formData["Frequency"] = document.getElementById("Frequency").value;
    formData["Days"] = document.getElementById("Days").value;
    formData["IssueedDate"] = document.getElementById("IssueedDate").value;
    return formData;
}

//Insert the data
function insertNewRecord(data) {
    var table = document.getElementById("PressList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
		cell1.innerHTML = data.DrugName;
    cell2 = newRow.insertCell(1);
		cell2.innerHTML = data.Dosage;
    cell3 = newRow.insertCell(2);
		cell3.innerHTML = data.Frequency;
    cell4 = newRow.insertCell(3);
		cell4.innerHTML = data.Days;
      cell5 = newRow.insertCell(4);
		cell5.innerHTML = data.IssueedDate;
    cell6 = newRow.insertCell(5);
        cell6.innerHTML = `<button onClick="onEdit(this)">Edit</button> <button onClick="onDelete(this)">Delete</button>`;
}

//Edit the data
function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("DrugName").value = selectedRow.cells[0].innerHTML;
    document.getElementById("Dosage").value = selectedRow.cells[1].innerHTML;
    document.getElementById("Frequency").value = selectedRow.cells[2].innerHTML;
    document.getElementById("Days").value = selectedRow.cells[3].innerHTML;
    document.getElementById("IssueedDate").value = selectedRow.cells[4].innerHTML;
    
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.DrugName;
    selectedRow.cells[1].innerHTML = formData.Dosage;
    selectedRow.cells[2].innerHTML = formData.Frequency;
    selectedRow.cells[3].innerHTML = formData.Days;
    selectedRow.cells[4].innerHTML = formData.IssueedDate;
}

//Delete the data
function onDelete(td) {
    if (confirm('Do you want to delete this record?')) {
        row = td.parentElement.parentElement;
        document.getElementById('PressList').deleteRow(row.rowIndex);
        resetForm();
    }
}

//Reset the data
function resetForm() {
    document.getElementById("DrugName").value = '';
    document.getElementById("Dosage").value = '';
    document.getElementById("Frequency").value = '';
    document.getElementById("Days").value = '';
    document.getElementById("IssueedDate").value = '';
    selectedRow = null;
}
