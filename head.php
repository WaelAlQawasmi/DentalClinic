<?php

 if(!isset($_SESSION['username']))
 {
     ?>
     <script type="text/javascript">
     window.location="index.php";
     </script>
     <?php
 }
     ?>
 

<!DOCTYPE html>
<html>
<head>
<title>DC-team</title>
<meta charset="UTF-8" />
<meta name="description" content="test Web " />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200&display=swap" rel="stylesheet">
<link rel="icon" href="images/DC.jpg">
<link rel="shortcut icon" href="images/DC.jpg">
<link rel="apple-touch-icon" href="images/DC.jpg">


</head>
<body>
  
<div id="body">
<div id="barden" style=" height: 10vh;">
<header  style="     background-image: none;
    background-color: rgb(1 1 4 / 0%); ">
<hr>
<div id="black-layer"   style="  background-color: rgb(1 1 4 / 0%);">
</div>
</header>
</div>
<nav id="bar">
<h3 id="logo">DC <span style="color: #007bff!important;">.</span></h3>
<span id="list-symbol"> <span onclick="openSidebar();" id="code-lest-sambol">&#9776;</span>
<div id="media-list" style="margin-top: 13px;">
  <h3 id="x" style="text-align: left;" onclick="closeSidebar();"> <a onclick="closeSidebar();">X</a></h3>
<h3 style="margin-top: 0vh;"><a id="menu-combonant" href="dashboard.php" > الرئيسية</a></h3>
<h3 style="margin-top: 0vh;"> <a id="menu-combonant1" href="./client.php">   العملاء </a></h3>


   <h3 style="margin-top: 0vh;"> <a id="menu-combonant3" href="https://login.black-ch.com/admin.php">    الاحصائيات </a></h3>   




<h3 style="margin-top: 0vh;"> <a id="menu-combonant2" href="https://login.black-ch.com/file-view.php">   الاشعارات </a></h3>

    <h3 style="margin-top: 0vh;"> <a id="menu-combonant3" onclick="outr();">  logout </a></h3>
</div>
</span>
</nav>
</div>

</header>
</div>
</div>




    </body>
        </html>
  