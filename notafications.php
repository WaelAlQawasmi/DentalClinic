
                  <?php
  date_default_timezone_set('Asia/Amman');
include "head.php"; 
include "DBconnection.php"; 
$daDay=date('d');
$afterday=date('d', strtotime(' + 1 days'));;
$aftertwoday=date('d', strtotime(' + 2 days'));;



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
             echo  "<tr>
                  
               <td>المبلغ المدفوع</td>
               <td>المبلغ الاصلي</td>
               <td>الباقي</td>
               <td><a >ادخل</a></td>
             </tr>
             <hr/>";
                foreach ($arr as $value) {

                    $c++;
               
                    $paied=$value["paied"];
                     $ctotal=$value["ctotal"];
                 if($paied==null){
                    $paied=0;
                 }
             
                    $diff=$ctotal-$paied;
                    if($diff>0)
                    echo "<tr>
                    <td>$value[cname]</td>
                    <td>$paied</td>
                    <td>$value[ctotal]</td>
                    <td>$diff</td>
                    <td><a href=\"profile.php?jordanid=$value[cid]\">ادخل</a></td>
                  </tr>
                  <hr/>";
                 
                
                
                    
                  }
             

            ?>