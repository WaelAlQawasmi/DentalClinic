<!doctype html>
<html lang="ar" dir="rtl">

  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
  #myInput {
    display: block;
    margin-right: 10%;
  background-image: url('./css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>
</head>
<body>
    <!-- navbar -->

  
    <?php
include "head.php"; ?>
    <!-- nav-->


  

<!--   table -->
    <div class="container" style="padding-left: 20%;" >
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">


    
 

    <div class="form-check" style="
    display: flex;
    /* text-align: center; */
    justify-content: space-around;
">
        <input class="form-check-input" type="checkbox" id="gridCheck1" style="
    display: block;
    margin-right: 15%;
">
        <label class="form-check-label" for="gridCheck1" style="
    display: block;
">
        الرقم الوطني
        </label>
      </div>
      



    <table class="table" style="margin: 10%; 
 "  id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم العميل</th>
      <th scope="col">الرقم الوطني</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>


  <?php
$dsn = "mysql:host=127.0.0.1;dbname=dcteam_dcteam;charset=utf8mb4";
$link = new PDO($dsn, "root", "");
   $stmt = $link->prepare("SELECT * FROM clients");
   $stmt->execute();
   $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
   $c=0;
   foreach ($arr as $value) {

    $c++;

    echo "<tr>
    <th scope=\"row\">$c</th>
    <td>$value[name]</td>
    <td>$value[jordanid]</td>
    <td><a href=\"profile.php?jordanid=$value[jordanid]\">ادخل</a></td>
  </tr>";
 


    
  }
?>
   
    
    
  </tbody>
</table>
</div>


<script>
function myFunction() {
  var checkBox= document.getElementById("gridCheck1");
  var inxex=0;
  if (checkBox.checked == true){
    inxex=1;
  } else {
    inxex=0;
  }
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[inxex];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<button style="position: fixed;
bottom: 10vh;
right: 0%;
cursor: pointer;
border: 1px solid #3498db1a;
background-color: transparent;
height: 10vh;
width: 10vh;
color: #3498db;
border-radius: 50px;
font-size: 1.5em;
box-shadow: 0 6px 6px rgb(0 0 0 / 60%);" > <a href="./addClient.php">+</a></button>
</body>


