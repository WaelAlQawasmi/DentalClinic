<!doctype html>
<html lang="ar" dir="rtl">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="css/main.css" >

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
  <!-- navbar -->


  <?php
  include "head.php";
  include "DBconnection.php";
  ?>
  <!-- nav-->




  <!--   table -->
  <div class="container" style="padding-left: 20%;">
    <input type="text" id="myInput" onkeyup="serch();" placeholder="Search for names.." title="Type in a name">





    <div class="form-check" style="">

      <label class="form-check-label" for="gridCheck1" style="display: inline-block;  margin-left: 10vh;">
        البحث من خلال الرقم الوطني
      </label>


      <input class="form-check-input" type="checkbox" id="gridCheck1" style=" display: inline-block;">
    </div>




    <table class="table" style="margin: 10%; 
 " id="myTable">
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

        $stmt = $link->prepare("SELECT clients.name,clients.jordanid,required_amounts.total AS total_reqired,SUM(pasys.amount) AS pasys_amount FROM clients LEFT JOIN required_amounts ON clients.jordanid=required_amounts.clintid LEFT JOIN pasys ON pasys.clintid=clients.jordanid GROUP BY clients.jordanid;
   ");
        $stmt->execute();
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $c = 0;
        foreach ($arr as $value) {

          $c++;


          if ($value['total_reqired'] == null || $value['total_reqired'] - $value['pasys_amount'] == 0) {
            echo "<tr style='color:red'>";
          } else {
            echo "<tr>";
          }
          echo "
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
    function serch() {
      var checkBox = document.getElementById("gridCheck1");
      var inxex = 0;
      if (checkBox.checked == true) {
        inxex = 1;
      } else {
        inxex = 0;
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
  <button id="btn_add_user"> <a href="./addClient.php">+</a></button>
</body>