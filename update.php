<!doctype html>
<html lang="en">
<?php

include 'head.php';
include "DBconnection.php";

$date=date("Y-m-d");


?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
  <?php // video-file.php


if( isset ($_POST["update"])){


$changedValue=$_POST['valueChanged'];
$id=$_GET['id'];

  if ($_GET['type'] == "amount") 
   {
     
    $sql = "UPDATE `pasys` SET `amount`=? WHERE id=?";
  $stmt= $link->prepare($sql);
  $stmt->execute([$changedValue,$id]);
   }
  else 
  {

    $sql = "UPDATE `status` SET `status`=? WHERE id=?";
    $stmt= $link->prepare($sql);
    $stmt->execute([$changedValue,$id]);
  }
  echo "  <script>
  window.close(); </script>";
}
  
  ?>
  <form method="post">


      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">التعديل </label>
        <textarea class="form-control" name="valueChanged" id="exampleFormControlTextarea1" rows="3" value=""><?php echo $_GET["value"]; ?></textarea  ?></textarea>
      </div>


   



      <div class="">
        <a class="btn btn-secondary" href="JavaScript:window.close()">الغاء</a>
        <button type="submit" name="update" class="btn btn-primary">حفظ التعديلات </button>
  </form>
  </div>



  </div>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
  <!-- <script>alert(document.getElementById("ckBox").value);</script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>