<?php
include "DBconnection.php";

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
?>
