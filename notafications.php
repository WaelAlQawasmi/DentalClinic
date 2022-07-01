<?php


// connection to DB
include "DBconnection.php";


// TO SET TIME ZONE
date_default_timezone_set('Asia/Amman');




// to  SELECT the user that muse pay  to day , tomorow and after tomoowro  and  he must pay
$daDay = (int)date('d');
$afterday =(int) date('d', strtotime(' + 1 days'));
$aftertwoday = (int)date('d', strtotime(' + 2 days'));


$stmt = $link->prepare("SELECT required_amounts.clintid AS cid ,required_amounts.total AS ctotal ,SUM(pasys.amount) AS paied , clients.name AS cname FROM required_amounts LEFT JOIN pasys ON required_amounts.clintid=pasys.clintid LEFT JOIN clients ON  required_amounts.clintid =clients.jordanid WHERE required_amounts.tdated =:da OR required_amounts.tdated = :da2 OR required_amounts.tdated = :da3 GROUP BY required_amounts.clintid;");
$stmt->bindParam(':da', $daDay);
$stmt->bindParam(':da2', $afterday);
$stmt->bindParam(':da3', $aftertwoday);
$stmt->execute();

$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
$paied = 0;
$ctotal = 0;
$cid = 0;
$c = 0;






      // to insert  to notofication if not pied to dat or before three day


      foreach ($arr as $value) {

        $c++;

        $paied = $value["paied"];

        if ($paied == null) {
          $paied = 0;
        }
// to select the pepole who pay today , yasert dat and befor one day
        $ctotal = $value["ctotal"];
        $jid = $value["cid"];
        $afterday = date('Y-m-d', strtotime(' + 1 days'));
        $afterYesterday = date("Y-m-d", strtotime('-3 days'));
        if ($ctotal - $paied > 0) {
          $stmt3 = $link->prepare("SELECT * FROM `pasys` WHERE `date` BETWEEN :da2 AND :da AND pasys.clintid=:da3;");
          $stmt3->bindParam(':da3', $jid);
          $stmt3->bindParam(':da', $afterday);
          $stmt3->bindParam(':da2', $afterYesterday);

          $stmt3->execute();

          $arrq = $stmt3->fetchAll(PDO::FETCH_ASSOC);
          if (count($arrq) == 0) {

            //echo  implode(" ",$arrq)." ->".count($arrq)."->".$jid ."**";

            //echo $jid;
            $stmt2 = $link->prepare("INSERT  IGNORE INTO `notifications` (`jordanid`)
VALUES (?);");

            $stmt2->bindParam(1, $jid);

            $stmt2->execute();
          }
        }
      }
