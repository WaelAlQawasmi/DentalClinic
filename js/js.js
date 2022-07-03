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