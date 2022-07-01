function serch() {
    var checkBox = document.getElementById("gridCheck1");
    var inxex = 0;
    if (checkBox.checked == true) {
        inxex = 1;
    } else {
        inxex = 0;
    }
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[inxex];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function validateForm() {
    var x = document.forms["formal"]["username"].value;
    if (x == "") {
        alert("الرجاء ادخال اسم المستخدم  ");
        return false;
    }
    var y = document.forms["formal"]["password"].value;
    if (y == "") {
        alert("الرجاء ادخال الرقم السري   ");
        return false;
    }
}

function io() {
    var x = document.getElementById("user");
    x.value = x.value.toLowerCase();
}

function outr() {
    location.replace("logout.php");
}

function closeSidebar() {
    document.getElementById("media-list").style.display = "none";
    document.getElementById("code-lest-sambol").style.display = "inline";
}

function openSidebar() {
    document.getElementById("media-list").style.display = "block";
    document.getElementById("code-lest-sambol").style.display = "none";
}