<?php
 
include "DBconnection.php"; 
//Store table records into an array

  $stmt = $link->prepare("SELECT clients.name,clients.jordanid,clients.phone,clients.address,required_amounts.total AS required_amount,required_amounts.tdated AS the_day,SUM(pasys.amount) AS paid FROM `clients`LEFT JOIN required_amounts ON clients.jordanid=required_amounts.clintid LEFT JOIN pasys ON clients.jordanid=pasys.clintid GROUP BY pasys.clintid;");
  $stmt->execute();
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $data = " ";

//Check the export button is pressed or not
if(isset($_POST["export"])) {
//Define the filename with current date
$fileName = "day".".csv";

//Set header information to export data in excel format
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header("Content-Disposition: attachment; filename=$fileName"); 
echo "\xef\xbb\xbf";

//Set variable to false for heading
$heading = false;

//Add the MySQL table data to excel file
if(!empty($items)) {

  $separator = '';
  // foreach ($items as $field) {
  //     if (preg_match('/\\r|\\n|,|"/', $field)) {
  //         $field = '"' . str_replace('"', '""', $field) . '"';
  //     }
  //     echo $separator . $field;
  //     $separator = ',';
  // }
  // echo "\r\n";

 $myfile = fopen($fileName, "w");
foreach($items as $item) {
if(!$heading) {
$data = $data.implode(",", array_keys($item)) . "\n";;
echo implode(",", array_keys($item)) . "\n";
$heading = true;
}
echo implode(",", array_values($item)) . "\n";
$data =$data.implode(",", array_values($item)) . "\n";
}


file_put_contents($fileName,$data);

}
exit();




}
?>
