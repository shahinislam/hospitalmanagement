

function selectMonitorSetting(selection) {
    var i;
    var x = document.getElementsByClassName("sub");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    document.getElementById(selection).style.display = "block"; 
}

/* Doctor */

function getSelectedDept(){
    var selectedValue=document.getElementById("selectDept").value;
    document.getElementById("selectedDept").value=selectedValue;
}

function getSelectedSex(){
    var selectedValue=document.getElementById("selectSex").value;
    document.getElementById("sex").value=selectedValue;
}

function getSelectedBlood(){
    var selectedValue=document.getElementById("selectBlood").value;
    document.getElementById("blood").value=selectedValue;
}

function getSelectedBirth(){
    var selectedDate=document.getElementById("selectDate").value;
    var selectedMonth=document.getElementById("selectMonth").value;
    var selectedYear=document.getElementById("selectYear").value;

    document.getElementById("birth").value=selectedDate+"/"+selectedMonth+"/"+selectedYear;
}

function getSelectedPatient(){
    var selectedValue=document.getElementById("selectPatient").value;
    document.getElementById("selectedPatient").value=selectedValue;
}

function getSelectedDoctor(){
    var selectedValue=document.getElementById("selectDoctor").value;
    document.getElementById("selectedDoctor").value=selectedValue;
}

function getSelectedBedNumber(){
    var selectedValue=document.getElementById("selectBedNumber").value;
    document.getElementById("selectedBedNumber").value=selectedValue;
}

function getSelectedManageReport(){
    var selectedValue=document.getElementById("selectManageReport").value;
    document.getElementById("selectedManageReport").value=selectedValue;
}
