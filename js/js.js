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
   
         
           
        
   // When the user scrolls down 50px from the top of the document, resize the header's font size
   window.onscroll = function() {scrollFunction();}
   
   function scrollFunction() {
     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("bar").style.backgroundColor = "white";
      document.getElementById("menu-combonant").style.color = "rgb(60, 149, 183)";
       document.getElementById("menu-combonant1").style.color = "rgb(60, 149, 183)";
        document.getElementById("menu-combonant2").style.color = "rgb(60, 149, 183)";
         document.getElementById("menu-combonant3").style.color = "rgb(60, 149, 183)";
        
          
     } else { document.getElementById("bar").style.color = "white";
       document.getElementById("bar").style.backgroundColor = "";
    document.getElementById("menu-combonant").style.color = "#1b1919bf";
      document.getElementById("menu-combonant1").style.color = "#1b1919bf";
     document.getElementById("menu-combonant2").style.color = "#1b1919bf";
      document.getElementById("menu-combonant3").style.color = "#1b1919bf";
    
     }
   }