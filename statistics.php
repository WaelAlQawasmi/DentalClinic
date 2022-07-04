<!doctype html>
<?php

date_default_timezone_set('Asia/Amman');
include "head.php"; 
include "DBconnection.php"; 




$stmt = $link->prepare("SELECT SUM(pasys.amount) AS apays FROM `pasys`;"); 

$stmt->execute();

$arr = $stmt->fetch(PDO::FETCH_ASSOC);
$name;
if ($arr) {
$all=$arr["apays"];
}

$stmt = $link->prepare("SELECT SUM(required_amounts.total)AS thetoltal FROM `required_amounts`;"); 

$stmt->execute();

$arr = $stmt->fetch(PDO::FETCH_ASSOC);
$name;
if ($arr) {
$thetoltal=$arr["thetoltal"];
}



$stmt = $link->prepare("SELECT COUNT(clients.name) AS theclients FROM clients ;"); 

$stmt->execute();

$arr = $stmt->fetch(PDO::FETCH_ASSOC);
$name;
if ($arr) {
$theclients=$arr["theclients"];
}?>










<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="css/ststistic.css" rel="stylesheet" />
    <title>الاحصاءات</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  </head>
  <body>
  

<div class="container" id="container" style="display:none">
    
      <script>

  let text;
  let password = prompt("الرجاء ادخال الرقم السري");
while(password!=82044066){
if(password==null){
break;
}
password = prompt("What's your favorite drink?", "Coca-Cola")
}
if(password==82044066){
const myElement = document.getElementById("container");
myElement.style.display= "block"
}


</script>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
       <div class="col">
		 <div class="card radius-10 border-start border-0 border-3 border-info">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">المبالغ الاجمالية</p>
						<h4 class="my-1 text-info"><?php echo $thetoltal." JD";?></h4>
					
					</div>
					<div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa fa-shopping-cart"></i>
					</div>
				</div>
			</div>
		 </div>
	   </div>
	   <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-danger">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">المبالغ المتبقية</p>
					   <h4 class="my-1 text-danger"><?php echo $thetoltal-$all ." JD";?></h4>
					  
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa fa-dollar"></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div>
	  <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-success">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">اجمالي الدفعات</p>
					   <h4 class="my-1 text-success"><?php echo $all ." JD";?></h4>
					 
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa fa-bar-chart"></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div>
	  <div class="col">
		<div class="card radius-10 border-start border-0 border-3 border-warning">
		   <div class="card-body">
			   <div class="d-flex align-items-center">
				   <div>
					   <p class="mb-0 text-secondary">مجموع العملاء</p>
					   <h4 class="my-1 text-warning"><?php echo $theclients;?></h4>
				
				   </div>
				   <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa fa-users"></i>
				   </div>
			   </div>
		   </div>
		</div>
	  </div> 

	</div>

	<script
src="https://www.gstatic.com/charts/loader.js">
</script>

<div style="
    padding: 5%;
    display: flex;
    justify-content: space-around;
">
	<div id="myChart" style="width:100%; max-width:600px; height:500px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 600px; height: 500px;"><div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="A chart."><svg width="600" height="500" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_0"><clipPath id="_ABSTRACT_RENDERER_ID_1"><rect x="115" y="96" width="371" height="309"></rect></clipPath></defs><rect x="0" y="0" width="600" height="500" stroke="none" stroke-width="0" fill="#f7f7ff"></rect><g><text text-anchor="start" x="115" y="73.05" font-family="Arial" font-size="13" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">الالتزام بالدفعات</text><rect x="115" y="62" width="371" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="115" y="96" width="371" height="309" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://127.0.0.1/DentalClinic/statistics.php#_ABSTRACT_RENDERER_ID_1)"><g><rect x="115" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="208" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="300" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="393" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="485" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="161" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="254" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="346" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="439" y="96" width="1" height="309" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="404" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="353" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="301" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="250" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="199" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="147" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="96" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="378" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="327" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="276" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="224" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="173" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="122" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect></g><g><rect x="115" y="404" width="371" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M115.5,301.8333333333333L300.5,199.16666666666666L485.5,96.5" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g></g><g><g><text text-anchor="middle" x="115.5" y="424.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">10</text></g><g><text text-anchor="middle" x="208" y="424.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">15</text></g><g><text text-anchor="middle" x="300.5" y="424.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">20</text></g><g><text text-anchor="middle" x="393" y="424.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="middle" x="485.5" y="424.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">30</text></g><g><text text-anchor="end" x="102" y="409.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="102" y="357.7167" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">5</text></g><g><text text-anchor="end" x="102" y="306.3833" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">10</text></g><g><text text-anchor="end" x="102" y="255.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">15</text></g><g><text text-anchor="end" x="102" y="203.7167" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">20</text></g><g><text text-anchor="end" x="102" y="152.38330000000002" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="end" x="102" y="101.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">30</text></g></g></g><g><g><text text-anchor="middle" x="300.5" y="467.55" font-family="Arial" font-size="13" font-style="italic" stroke="none" stroke-width="0" fill="#222222">Square Meters</text><rect x="115" y="456.5" width="371" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><text text-anchor="middle" x="48.55" y="250.5" font-family="Arial" font-size="13" font-style="italic" transform="rotate(-90 48.55 250.5)" stroke="none" stroke-width="0" fill="#222222">Price in Millions</text><path d="M37.49999999999999,405L37.50000000000001,96L50.50000000000001,96L50.49999999999999,405Z" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></path></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: 10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Price</th><th>Size</th></tr></thead><tbody><tr><td>10</td><td>10</td></tr><tr><td>20</td><td>20</td></tr><tr><td>30</td><td>30</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 510px; left: 610px; white-space: nowrap; font-family: Arial; font-size: 13px; font-weight: bold;">الالتزام بالدفعات</div><div></div></div></div>
	<div id="myChart2" style="width:100%; max-width:600px; height:500px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 600px; height: 400px;"><div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="A chart."><svg width="600" height="400" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_2"><clipPath id="_ABSTRACT_RENDERER_ID_3"><rect x="115" y="77" width="371" height="247"></rect></clipPath></defs><rect x="0" y="0" width="600" height="400" stroke="none" stroke-width="0" fill="#f7f7ff"></rect><g><text text-anchor="start" x="115" y="54.05" font-family="Arial" font-size="13" font-weight="bold" stroke="none" stroke-width="0" fill="#000000">Density of Precious Metals, in g/cm^3</text><rect x="115" y="43" width="371" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect></g><g><rect x="115" y="77" width="371" height="247" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(http://127.0.0.1/DentalClinic/statistics.php#_ABSTRACT_RENDERER_ID_3)"><g><rect x="115" y="323" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="282" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="241" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="200" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="159" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="118" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="77" width="371" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="115" y="303" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="262" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="221" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="180" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="139" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect><rect x="115" y="98" width="371" height="1" stroke="none" stroke-width="0" fill="#e6e6eb"></rect></g><g><rect x="117" y="242" width="71" height="81" stroke="#808080" stroke-width="1" fill="#808080"></rect><rect x="191" y="209" width="71" height="114" stroke="#76a7fa" stroke-width="1" fill="#76a7fa"></rect><rect x="265" y="193" width="71" height="130" stroke="none" stroke-width="0" fill-opacity="0.2" fill="#3366cc"></rect><rect x="339" y="144" width="71" height="179" stroke="#703593" stroke-width="4" fill="#c5a5cf"></rect><rect x="413" y="94" width="71" height="229" stroke="#871b47" stroke-width="8" stroke-opacity="0.6" fill-opacity="0.2" fill="#bc5679"></rect></g><g><rect x="115" y="323" width="371" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g></g><g></g><g><g><text text-anchor="middle" x="152.5" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">2010</text></g><g><text text-anchor="middle" x="226.5" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">2020</text></g><g><text text-anchor="middle" x="300.5" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">2030</text></g><g><text text-anchor="middle" x="374.5" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">2040</text></g><g><text text-anchor="middle" x="448.5" y="343.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#222222">2050</text></g><g><text text-anchor="end" x="102" y="328.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">0</text></g><g><text text-anchor="end" x="102" y="287.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">5</text></g><g><text text-anchor="end" x="102" y="246.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">10</text></g><g><text text-anchor="end" x="102" y="205.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">15</text></g><g><text text-anchor="end" x="102" y="164.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">20</text></g><g><text text-anchor="end" x="102" y="123.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">25</text></g><g><text text-anchor="end" x="102" y="82.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#444444">30</text></g></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: 10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Year</th><th>Visitations</th></tr></thead><tbody><tr><td>2010</td><td>10</td></tr><tr><td>2020</td><td>14</td></tr><tr><td>2030</td><td>16</td></tr><tr><td>2040</td><td>22</td></tr><tr><td>2050</td><td>28</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 410px; left: 610px; white-space: nowrap; font-family: Arial; font-size: 13px; font-weight: bold;">Density of Precious Metals, in g/cm^3</div><div></div></div></div>
</div>
	<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
var data = google.visualization.arrayToDataTable([
  ['Price', 'Size'],
 [10,10],[20,20],[30,30]
]);
// Set Options
var options = {
  title: 'الالتزام بالدفعات',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  backgroundColor: '#f7f7ff',

  legend: 'none'
};
// Draw
var chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);



//other car
var options = {
        title: "الدفعات لكل شهر",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
		backgroundColor: '#f7f7ff',
      };

var data = google.visualization.arrayToDataTable([
        ['الشهر', 'تم تحصيل', { role: 'style' } ],
        ['7', 10, 'color: gray'],
        ['8', 14, 'color: #76A7FA'],
        ['9', 16, 'opacity: 0.2'],
        ['10', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['11', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);
	  var chart = new google.visualization.ColumnChart(document.getElementById('myChart2'));
chart.draw(data, options);

}
</script>
<script type="text/javascript">  
document.body.requestFullscreen();
</script> 

</div>

    <!-- Optional JavaScript; choose one of the two! -->
	
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
