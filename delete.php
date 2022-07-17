<?php


if( isset ($_GET["deleteid"])&& $_GET["delete_opration"]=="delete_status"){
   $id= $_GET["deleteid"];
   $jordanid= $_GET["jordanid"];
include "DBconnection.php";

  $stmt = $link->prepare("INSERT INTO `logs` (`clintid`, `type`, `date`, `user`)
    VALUES (?,?,?,?);");
    $opration= "حذف حالة";
    $date=date(" Y-m-d h:i:sa");
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2,$opration);
    $stmt->bindParam(3,$date);
    $stmt->bindParam(4,$_SESSION['username']);
    $stmt->execute();
  
  $stmt = $link->prepare("DELETE FROM `status` WHERE `status`.`id` = :da");
      $stmt->bindParam(":da", $id);

    $stmt->execute(); 
    echo " <script> alert(\"تم الحذف بنجاح\")

    window.location = \"profile.php?jordanid=$jordanid\";

    </script>";



}





if( isset ($_GET["deleteid"])&& $_GET["delete_opration"]=="delete_payed"){
   $id= $_GET["deleteid"];
   $jordanid= $_GET["jordanid"];
include "DBconnection.php";

  $stmt = $link->prepare("INSERT INTO `logs` (`clintid`, `type`, `date`, `user`)
    VALUES (?,?,?,?);");
    $opration= "حذف دفعة";
    $date=date(" Y-m-d h:i:sa");
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2,$opration);
    $stmt->bindParam(3,$date);
    $stmt->bindParam(4,$_SESSION['username']);
    $stmt->execute();
  
  $stmt = $link->prepare("DELETE FROM `pasys` WHERE `pasys`.`id` = :da");
      $stmt->bindParam(":da", $id);

    $stmt->execute(); 
    echo " <script> alert(\"تم الحذف بنجاح\")

    window.location = \"profile.php?jordanid=$jordanid\";

    </script>";



}
