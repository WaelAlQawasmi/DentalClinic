<?php
include "DBconnection.php";

$date=date("Y-m-d");
// add new user
if (isset($_POST["submit_add_user"])) {

  
        $jordanid = $_POST["jordanid"];
        $stmt = $link->prepare("SELECT * FROM clients WHERE jordanid = :jid");
        $stmt->bindParam(':jid', $jordanid);

        $stmt->execute();
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($arr) {
            echo " <script> alert(\"الرقم الوطني موجود \")</script>";
        } else {

            $jordanid2 = $_POST["jordanid"];
            $name2 = $_POST["name"];
            $address2 = $_POST["address"];
            $phone2 = $_POST["phone"];
            $job2 = $_POST["job"];
            $sex2 = $_POST["sex"];

            $stmt2 = $link->prepare("INSERT INTO `clients` (`name`, `jordanid`, `phone`, `job`, `address`,`sex`)  
                                          VALUES (?,?,?,?,?,?);");

            $stmt2->bindParam(1, $name2);
            $stmt2->bindParam(2, $jordanid2);
            $stmt2->bindParam(3, $phone2);
            $stmt2->bindParam(4, $job2);
            $stmt2->bindParam(5, $address2);
            $stmt2->bindParam(6, $sex2);
            $stmt2->execute();
            echo ' <script> alert("تم التسجيل بنجاح")</script>';
        }
    
}






// اضافة دفعة
if( isset ($_POST["submit2"])){

    
  
$amount=$_POST['amount'];


  if(is_integer((int)$amount)){
    $stmt = $link->prepare("INSERT INTO `pasys` (`clintid`, `amount`, `date`)  
    VALUES (?,?,?);");
    
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2, $amount);
    $stmt->bindParam(3, $date);
    $stmt->execute();


    $stmt = $link->prepare("DELETE FROM notifications WHERE `notifications`.`jordanid` = :da");
    


    $stmt->bindParam(":da", $jordanid);

    $stmt->execute();




    $stmt = $link->prepare("INSERT INTO `logs` (`clintid`, `type`, `ammount`, `date`, `user`)
    VALUES (?,?,?,?,?);");
    $opration= "اضافة دفعة";
    $date=date(" Y-m-d h:i:sa");
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2,$opration);
    $stmt->bindParam(3, $amount);
    $stmt->bindParam(4,$date);
    $stmt->bindParam(5,$_SESSION['username']);
    $stmt->execute();

    echo ' <script> alert("تم التسجيل بنجاح")</script>';
    echo "<meta http-equiv='refresh' content='0'>";
}
else{
  echo ' <script> alert(" ادخلت قيم خاطئة")</script>';
}
}








//حذف العميل

if( isset ($_POST["delete"])){


  $stmt = $link->prepare("INSERT INTO `logs` (`clintid`, `type`, `date`, `user`)
    VALUES (?,?,?,?);");
    $opration= "حذف العميل";
    $date=date(" Y-m-d h:i:sa");
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2,$opration);
    $stmt->bindParam(3,$date);
    $stmt->bindParam(4,$_SESSION['username']);
    $stmt->execute();
  
  $stmt = $link->prepare("DELETE FROM clients WHERE `clients`.`jordanid` = :da");
      $stmt->bindParam(":da", $jordanid);

    $stmt->execute(); 
    echo " <script> alert(\"تم الحذف بنجاح\")</script>";
    echo" <meta http-equiv=\"refresh\" content=\"0;url=allclients.php\">";

}





//اضافة مبلغ

if( isset ($_POST["submit"])){

    

$total=$_POST['total'];
$months=$_POST['months'];
$tdated=$_POST['date'];
if($arrPays==null){
  if(is_integer((int)$total)&&is_integer((int)$months)){
    $stmt = $link->prepare("INSERT INTO `required_amounts` (`clintid`, `tdated`, `total`, `monthg`)
    VALUES (?,?,?,?);");
    
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2, $tdated);
    $stmt->bindParam(3, $total);
    $stmt->bindParam(4,$months);
    $stmt->execute();


    $stmt = $link->prepare("INSERT INTO `logs` (`clintid`, `type`, `ammount`, `date`, `user`)
    VALUES (?,?,?,?,?);");
    $opration= "اضافة مبلغ لاول مرة";
    $date=date(" Y-m-d h:i:sa");
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2,$opration);
    $stmt->bindParam(3, $total);
    $stmt->bindParam(4,$date);
    $stmt->bindParam(5,$_SESSION['username']);
    $stmt->execute();

    echo ' <script> alert("تم التسجيل بنجاح")</script>';
    echo "<meta http-equiv='refresh' content='0'>";
}
else{
  echo ' <script> alert(" ادخلت قيم خاطئة")</script>';
}
}
else{
 
  
  if(is_int((int)$_POST['total'])&&is_int((int)$months)){
    $total2=$OrgialTotal+$_POST['total'];

    $stmt = $link->prepare("INSERT INTO `logs` (`clintid`, `type`, `ammount`, `date`, `user`)
    VALUES (?,?,?,?,?);");
    $opration= "اضافة مبلغ";
    $date=date(" Y-m-d h:i:sa");
    $stmt->bindParam(1, $jordanid);
    $stmt->bindParam(2,$opration);
    $stmt->bindParam(3, $total);
    $stmt->bindParam(4,$date);
    $stmt->bindParam(5,$_SESSION['username']);
    $stmt->execute();


  $sql = "UPDATE required_amounts SET tdated=?, monthg=?, total=? WHERE clintid=?";
  $stmt= $link->prepare($sql);
  $stmt->execute([$tdated, $months, $total2, $jordanid]);
  echo ' <script> alert("تم التسجيل بنجاح")</script>';
  echo "<meta http-equiv='refresh' content='0'>";

  }
  else{
    echo " ادخلت قيم خاطئة";
    echo ' <script> alert(" ادخلت قيم خاطئة")</script>';
  }
}
}





// اضافة حالة



if( isset ($_POST["submit3"])){

    
  
  
 
      $status=$_POST['status'];
      $stmt = $link->prepare("INSERT INTO `status` ( `jordanid`, `status`, `date`) VALUES (?,?,?)");
      
      $stmt->bindParam(1, $jordanid);
      $stmt->bindParam(2, $status);
      $stmt->bindParam(3, $date);
      $stmt->execute();
  
  
  
  
  
      $amount2=1;
      $stmt = $link->prepare("INSERT INTO `logs` (`clintid`, `type`, `ammount`, `date`, `user`)
      VALUES (?,?,?,?,?);");
      $opration= "اضافة حالة";
      $date=date(" Y-m-d h:i:sa");
      $stmt->bindParam(1, $jordanid);
      $stmt->bindParam(2,$opration);
      $stmt->bindParam(3, $amount2);
      $stmt->bindParam(4,$date);
      $stmt->bindParam(5,$_SESSION['username']);
      $stmt->execute();
  
      echo ' <script> alert("تم التسجيل بنجاح")</script>';
      echo "<meta http-equiv='refresh' content='0'>";
  }
?>
