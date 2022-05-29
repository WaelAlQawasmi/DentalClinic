function activation() {
    var chek = document.getElementById("che").checked;
    var b;
    if (chek === false) {
        b = 2;
        alert("! تم ايقاف تفعيل المنصة ");
        document.getElementById("stat").innerHTML = " المنصة غير فعالة";
    } else {
        b = 1;
        alert("!تم تفعيل المنصة");
        document.getElementById("stat").innerHTML = " المنصة  فعالة";
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        }
    };
    xhttp.open("GET", "https://dcteam.nerd-plat.site/active_plat.php?op=" + b, true);
    xhttp.send();
}