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
<button class=" btn" type="button" id="option2" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" style="
    width: 0%;
    HEIGHT: 0VH;
    POSITION: FIXED;
    background-color: #ffffff00;
"> <img src="images/setting-lines.png" title="settings icons" style="
    /* width: 10%; */
    height: 5vh;
"></button>
 
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





<!-- تعديل الرقم السري -->

<div class="container">

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> تعديل الرقم السري </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> الرقم القديم</label>
            <input type="number" name="oldPass" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> الرقم الجديد</label>
            <input type="number" name="NewPass" class="form-control" id="recipient-name" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button name="EditPassword" type="submit" class="btn btn-primary"> تعديل</button>
          </div>
        </form>
      </div>

    </div>
  </div>

</div>

</div>

<?php 
  if (isset($_POST["EditPassword"])) {
$oldPass=$_POST["oldPass"];
$NewPass=$_POST["NewPass"];
    include "../DBconnection.php";

    $stmt = $link->prepare("SELECT * FROM users WHERE username = :nam  && password = :pass ");
    $stmt->bindParam(':nam', $username);
    $stmt->bindParam(':pass', $oldPass);
    $stmt->execute();
    $arr = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$arr) {

       
      echo ' <script> alert("الرقم السري القديم خطأ  ")</script>';

    } else {
        session_start();
        $_SESSION['username'] =  $username;


        
  $sql = "UPDATE users SET password=? WHERE username=?";
  $stmt= $link->prepare($sql);
  $stmt->execute([$NewPass, $username]);
  echo ' <script> alert("تم التعديل بنجاح")</script>';
  echo "<meta http-equiv='refresh' content='0'>";
    ?>

       
     

       
<?php }
}

?>


</body>
</html>
