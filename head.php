

 <?php
 // to chech he in othrize
 session_start();
 if(!isset($_SESSION['username']))
 {
     ?>
     <script type="text/javascript">
     window.location="index.html";
     </script>
     <?php
 }

// connection to DB
 include "DBconnection.php";


// TO SET TIME ZONE
date_default_timezone_set('Asia/Amman');
 



// to  SELECT the user that muse pay  to day , tomorow and after tomoowro 
$daDay=date('d');
$afterday=date('d', strtotime(' + 1 days'));
$aftertwoday=date('d', strtotime(' + 2 days'));


                $stmt = $link->prepare("SELECT required_amounts.clintid AS cid ,required_amounts.total AS ctotal ,SUM(pasys.amount) AS paied , clients.name AS cname FROM required_amounts LEFT JOIN pasys ON required_amounts.clintid=pasys.clintid LEFT JOIN clients ON  required_amounts.clintid =clients.jordanid WHERE required_amounts.tdated =:da OR required_amounts.tdated = :da2 OR required_amounts.tdated = :da3 GROUP BY required_amounts.clintid;");
                  $stmt->bindParam(':da', $daDay);
                  $stmt->bindParam(':da2', $afterday);
                  $stmt->bindParam(':da3', $aftertwoday);
                  $stmt->execute();
                 
                  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $paied=0;
                  $ctotal=0;
                $cid=0;
               $c=0;
           
              
                  ?>
             


 <!doctype html>
<html lang="ar" dir="rtl">
<head>
<title>عيادة الاسنان</title>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  








    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">الابتسامة الفاتنة </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./dashboard.php">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./allclients.php" >العملاء</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="statistics.php">إحصائيات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="myBtn"  href="#">
                                              الاشعارات
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="./exportExal.php">  النسخ الاحتياطي</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">تسجيل خروج</a>
                    </li>
    
    </ul>
  </div>
</nav>



<!-- nav bar  end -->


<!-- notofication content start -->
    <!-- <link rel="stylesheet" href="css/head2.css"> -->

    <div id="myModal" class="modal">


<div class="modal-content">
  <span class="close">&times;</span>


  <?php  
  
  

  // to insert  to notofication if not pied to dat or before three day

                        
 foreach ($arr as $value) {

$c++;

$paied=$value["paied"];

if($paied==null){
    $paied=0;}

 $ctotal=$value["ctotal"];
 $jid=$value["cid"];
 $afterday=date('Y-m-d', strtotime(' + 1 days'));
$afterYesterday=date("Y-m-d" ,strtotime('-3 days'));
if($ctotal-$paied>0){
    $stmt3 = $link->prepare("SELECT * FROM `pasys` WHERE `date` BETWEEN :da2 AND :da AND pasys.clintid=:da3;");
    $stmt3->bindParam(':da3', $jid);
    $stmt3->bindParam(':da', $afterday);
   $stmt3->bindParam(':da2',$afterYesterday);
  
   $stmt3->execute();

  $arrq = $stmt3->fetchAll(PDO::FETCH_ASSOC);
  if(count($arrq)==0){

//echo  implode(" ",$arrq)." ->".count($arrq)."->".$jid ."**";

  //echo $jid;
$stmt2 = $link->prepare("INSERT  IGNORE INTO `notifications` (`jordanid`)
VALUES (?);");
  
$stmt2->bindParam(1,$jid);

$stmt2->execute();
 }
}
}





// to select from the notofications

$stmt = $link->prepare("SELECT notifications.jordanid AS jidc, clients.name AS nameofclint FROM `notifications` LEFT JOIN clients ON notifications.jordanid=clients.jordanid;");
$stmt->execute();

$arr2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($arr2 as $value) {
 
    

echo "<span>

لقد  حان استحقاق <a href=\"profile.php?jordanid=$value[jidc]\">$value[nameofclint]</a></td>
دينار  حيث تبقى عليه
<hr/> <span>";

}



?>

</div>



</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- notofication content end -->
    <script src="js/dash.js"></script>
    <script src="js/js.js"></script>

    </body>
        </html>
  