<?php
 session_start();
 if(!isset($_SESSION['username']))
 {
     ?>
     <script type="text/javascript">
     window.location="index.php";
     </script>
     <?php
 }
 $conn  = mysqli_connect("localhost","root","","dcteam_dcteam");
date_default_timezone_set('Asia/Amman');
 $em=$_SESSION['username'];
 $y=date("Y-m-d H:i:s");
$sqlp="SELECT * FROM `users` WHERE `username`='$em'";
 $sel_quey="UPDATE `users` SET `last_sctivity` = '".$y."' WHERE username='".$em."'";
  $res=mysqli_query($conn, $sqlp);
 mysqli_query($conn, $sel_quey);
 while($row = mysqli_fetch_assoc($res)) {
 
     $_SESSION['username']= $row['username'];
    
 }

 

 ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@200&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/dash.css">
<body>



<?php
include "head.php"; ?>

</head>

<div  class="card">
  
 
      <img style="max-height: 60vh; " src="images/bg-01.jpg"/>
  
     <h1 style="font-size:33px">
    <?php
echo $_SESSION['username'];

?>
</h1>
<p id="about"> 

</p>




<script src="js/dash.js"></script>




</body>
</html>
