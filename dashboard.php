<?php
include "head.php";
include "DBconnection.php"; ?>
<?php

date_default_timezone_set('Asia/Amman');
$username=$_SESSION['username'];
$the_date=date("Y-m-d H:i:s");
$sql = "UPDATE users SET last_login=? WHERE username=?";
$stmt= $link->prepare($sql);
$stmt->execute([$the_date, $username]);



 

 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@200&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">

</head>
<body>




<div class="container-fluid">
<div  class="card">
  
 
      <img style="height: 85vh; " src="images/bg-01.jpg"/>
  
     <h1 style="font-size:33px;     text-align: center;
">
    <?php
echo $_SESSION['username'];

?>
</h1>

</div>
</div>


<script src="js/dash.js"></script>




</body>
</html>
