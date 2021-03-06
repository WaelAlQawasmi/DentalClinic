<!doctype html>
<html lang="en">
<?php

date_default_timezone_set('Asia/Amman');
include "head.php";
include "DBconnection.php";
?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/profile.css">
  <title>profile</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>


  <?php





  $jordanid = $_GET["jordanid"];
  $stmt = $link->prepare("SELECT * FROM clients WHERE jordanid = :jid");
  $stmt->bindParam(':jid', $jordanid);

  $stmt->execute();
  $arr = $stmt->fetch(PDO::FETCH_ASSOC);
  $name;
  if ($arr) {
    $id = $arr["id"];
    $name = $arr["name"];
    $jordanid = $arr["jordanid"];
    $phone = $arr["phone"];
    $address = $arr["address"];
    $job = $arr["job"];
    $sex = $arr["sex"];

    if ($sex == "ذكر") {
      $imgUrl = "css/avatar7.png";
    } else {
      $imgUrl = "css/avatar3.png";
    }
  }

  ?>

  <div class="container" id="html">
    <div class="main-body">

      <!-- Breadcrumb -->

      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <form method="post">
                <button type="submit" id="delete" name="delete" style=" display: none; border: #fff8dc00;color:red;background-color: white;" class=" w3-xxlarge fa fa-trash"></button>
              </form>
              <form method="post">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="<?php echo $imgUrl; ?>" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4><?php echo $name ?></h4>
                    <p class="text-secondary mb-1"><?php echo $job ?></p>
                    <p class="text-muted font-size-sm"><?php echo $sex ?></p>


                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                      <button class="btn btn  btn-outline-info" type="button" id="option2" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo"> تسديد مبلغ</button>

                      <button class="btn btn btn-outline-primary" type="button" id="option2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> اضافة مبلغ</button>
                      <button class="btn btn btn-outline-success" type="button" id="option2" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo"> اضافة حالة</button>


                    </div>
                  </div>
                </div>
            </div>
          </div>



        </div>

        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">الاسم الكامل </h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" name="name" style="border: none;  " class="form-control" value="<?php echo $name; ?>" />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">رقم الهاتف</h6>
                </div>
                <div class="col-sm-9 text-secondary">


                  <input type="text" name="phone" style="border: none; " class="form-control" value="<?php echo $phone; ?>" />

                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">الرقم الوطني</h6>
                </div>
                <div class="col-sm-9 text-secondary">

                  <input type="text" name="jordanid" style="border: none; " class="form-control" value="<?php echo $jordanid; ?>" dise />

                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">العمل</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" name="job" style="border: none; " class="form-control" value="<?php echo $job; ?>" />


                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">العنوان</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" name="address" style="border: none; " class="form-control" value="<?php echo $address; ?>" />

                </div>
              </div>
              <hr>
              <div class="row">

                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                  <input type="button" class="btn btn-danger px-4" id="ennable_btn" value="تفعيل التعديل" onclick="changeEblity()">
                  <button type="submit" name="changBtn" class="btn btn-primary px-4" style="display:none;" id="edait" value="تعديل">تعديل </button>
                </div>
              </div>


            </div>
          </div>

        </div>


      </div>
      </form>

      <script>
        function changeEblity() {
          document.getElementById("ennable_btn").style.display = "none";
          document.getElementById("delete").style.display = "inline";
          document.getElementById("edait").style.display = "inline";
        }
      </script>
      <?php


      if (isset($_POST["changBtn"])) {


        $name = $_POST['name'];
        $jordanid = $_POST['jordanid'];
        $phone = $_POST['phone'];
        $job = $_POST['job'];
        $address = $_POST['address'];

        $sql = "UPDATE `clients` SET `name` = ?, `jordanid` = ?, `phone` = ?, `job` = ?, `address` =? WHERE `clients`.`id` = ?";
        $stmt = $link->prepare($sql);
        $stmt->execute([$name, $jordanid, $phone, $job, $address, $id]);
        echo " <script> alert(\"$_POST[name]تم التعديل بنجاح\")</script>";
        echo " <meta http-equiv=\"refresh\" content=\"0;url=profile.php?jordanid=$jordanid\">";
      }

      ?>

      <div class="col-sm-9" style="    margin: auto;">


        <nav class="nav">
          <a class="nav-link" href="#home" data-toggle="tab">الدفعات</a>
          <a class="nav-link" href="#messages" data-toggle="tab">حالة المريض</a>
          <a class="nav-link" href="#settings" data-toggle="tab">الملخص</a>

        </nav>
        <div class="tab-content">
          <div class="tab-pane active" id="home">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>قيمة الدفعة</th>
                    <th>تاريخ الدفعة</th>

                  </tr>
                </thead>
                <tbody id="items">


                  <?php

                  $stmt = $link->prepare("SELECT * FROM `pasys` WHERE clintid = :jid");
                  $stmt->bindParam(':jid', $jordanid);
                  $stmt->execute();
                  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $c = 0;
                  foreach ($arr as $value) {

                    $c++;

                    echo "<tr>
    <th scope=\"row\">$c</th>
    <td>$value[amount]</td>
    <td>$value[date]</td>
 
  </tr>";
                  }
                  ?>


                </tbody>
              </table>
              <hr>
              <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <ul class="pagination" id="myPager"></ul>
                </div>
              </div>
            </div>
            <!--/table-resp-->

            <hr>

          </div>
          <!--/tab-pane-->
          <div class="tab-pane" id="messages">

            <h2></h2>

            <ul class="list-group">
              <li class="list-group-item text-muted">Inbox</li>
              <?php
              $jordanid = $_GET["jordanid"];
              $stmt = $link->prepare("SELECT * FROM `status` WHERE `jordanid`=:jid  ORDER BY `status`.`date` DESC");
              $stmt->bindParam(':jid', $jordanid);
              $stmt->execute();
              $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
              $c = 0;
              foreach ($arr as $value) {



                echo "
           <li class=\"list-group-item text-right\"><pre class=\"pull-left\">$value[status]</pre> $value[date] </li>
        ";
              }
              ?>

            </ul>

          </div>
          <!--/tab-pane-->
          <div class="tab-pane" id="settings">

            <hr>

            <?php


            $stmt = $link->prepare("SELECT SUM(amount) AS paied FROM `pasys` WHERE `clintid`=:jid GROUP BY `clintid`;");
            $stmt->bindParam(':jid', $jordanid);

            $stmt->execute();
            $arrPays = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalPaied = 0;
            if ($arrPays != null) {
              $totalPaied = $arrPays["paied"];
            }



            $stmt = $link->prepare("SELECT * FROM required_amounts WHERE clintid = :jid");
            $stmt->bindParam(':jid', $jordanid);

            $stmt->execute();
            $arrPays = $stmt->fetch(PDO::FETCH_ASSOC);
            $name;
            $OrgialTotal = 0;
            $monthg = 0;
            $tdated = 0;
            $mpay = 0;
            if ($arrPays != null) {
              $OrgialTotal = $arrPays["total"];
              $monthg = $arrPays["monthg"];
              $tdated = $arrPays["tdated"];
              $mpay = $OrgialTotal / $monthg;
            }

            ?>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="first_name">
                  <h4>القيمة المطلوبة</h4>
                </label>
                <input type="text" class="form-control" name="total" id="first_name" value="<?php echo $OrgialTotal . "JD"; ?>" disabled>
              </div>
            </div>



            <div class="form-group">

              <div class="col-xs-6">
                <label for="phone">
                  <h4> القيمة المسددة</h4>
                </label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $totalPaied; ?>" disabled>
              </div>
            </div>


            <div class="form-group">

              <div class="col-xs-6">
                <label for="phone">
                  <h4> المبلغ المتبقي</h4>
                </label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $OrgialTotal - $totalPaied; ?>" disabled>
              </div>
            </div>

            <div class="form-group">

              <div class="col-xs-6">
                <label for="last_name">
                  <h4> يوم الاستحقاق</h4>
                </label>
                <input type="text" class="form-control" name="last_name" id="last_name" title="enter your last name if any." value="<?php echo $tdated . " من كل شهر"; ?>" disabled>
              </div>
            </div>

            <div class="form-group">

              <div class="col-xs-6">
                <label for="phone">
                  <h4> عدد الاشهر</h4>
                </label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $mpay; ?>" disabled>
              </div>
            </div>


            <div class="form-group">

              <div class="col-xs-6">
                <label for="phone">
                  <h4> قيمة الدفعة الشهرية</h4>
                </label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo  $monthg . " JD"; ?>" disabled>
              </div>
            </div>


          </div>

        </div>
        <!--/tab-pane-->
      </div>
      <!--/tab-content-->

    </div>
    <!--/col-9-->
  </div>


  </div>






  <!-- اضافة مبلغ -->


  <div class="container">

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">اضافة مبلغ </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">قيمة المبلغ</label>
                <input type="number" name="total" class="form-control" id="recipient-name" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label"> قيمة الدفعة</label>
                <input type="number" name="months" class="form-control" id="recipient-name" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">يوم الاسنحقاق</label>
                <select class="form-select" name="date" aria-label="Default select example" id="select" required>


                  <script>
                    let num = document.getElementById("select");

                    for (let index = 1; index < 29; index++) {

                      let option = document.createElement("option");
                      option.value = index;
                      option.innerHTML = index;
                      num.appendChild(option);
                      //consol.log(index);
                    }
                  </script>


                </select>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button name="submit" type="submit" class="btn btn-primary"> اضافة</button>
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>

  </div>


  <!-- 
اضافة دفعة -->

  <div class="container">

    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">اضافة دفعة </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">قيمة المبلغ</label>
                <input type="number" name="amount" class="form-control" id="recipient-name" required>
              </div>



              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button name="submit2" type="submit" class="btn btn-primary"> اضافة</button>
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>

  </div>





  <!-- 
اضافة حالة -->

  <div class="container">

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">اضافةحالة </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="message-text" class="col-form-label">اضافةحالة</label>
                <textarea class="form-control" id="message-text" name="status"></textarea>
              </div>



              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                <button name="submit3" type="submit" class="btn btn-primary"> اضافة</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- connect to functionality -->

  <?php
  include "./functionality.php";

  ?>

  <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>