
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./css/profile.css">
    <title>profile</title>
  </head>
  <body>
  
  
  <?php
  date_default_timezone_set('Asia/Amman');
include "head.php"; 
include "DBconnection.php"; 


$jordanid= $_GET["jordanid"];
    $stmt = $link->prepare("SELECT * FROM clients WHERE jordanid = :jid");
    $stmt->bindParam(':jid', $jordanid);
 
    $stmt->execute();
    $arr = $stmt->fetch(PDO::FETCH_ASSOC);
    $name;
    if ($arr) {
$name=$arr["name"];
$jordanid=$arr["jordanid"];
$phone=$arr["phone"];
$address=$arr["address"];
$job=$arr["job"];
$sex=$arr["sex"];
if($sex=="ذكر"){
    $imgUrl="css/avatar7.png";
}
else{
    $imgUrl="css/avatar3.png" ;
}

    }

    ?>

  <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
      
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo $imgUrl;?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $name?></h4>
                      <p class="text-secondary mb-1"><?php echo $job?></p>
                      <p class="text-muted font-size-sm"><?php echo $sex?></p>
                     

                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
 
  <button  class="btn btn  btn-outline-info" type="button" id="option2"  data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo"> تسديد مبلغ</button>

    <button  class="btn btn btn-outline-primary" type="button" id="option2"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  autocomplete="off"> اضافة مبلغ</button>

  <label class="btn btn-outline-success">
    <input type="radio" name="options" id="option3" autocomplete="off"> اضافة حالة
  </label>
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
                    <?php echo  $name?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">رقم الهاتف</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $phone?>
  


                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">الرقم الوطني</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $jordanid?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">العمل</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $job?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">العنوان</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo  $address?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <!-- <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div> -->
                  </div>
                </div>
              </div>

              <!-- <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->



            </div>
          </div>

        </div>


        </div>









        <div class="col-sm-9" style="    margin: auto;">


<nav class="nav">
  <a class="nav-link" href="#home"  data-toggle="tab">الدفعات</a>
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
   $c=0;
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
            <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
            <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
            <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
            <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
            <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
            <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
            <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
            <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>

        </ul>

    </div>
    <!--/tab-pane-->
    <div class="tab-pane" id="settings">

        <hr>
        

        <?php
                  $jordanid= $_GET["jordanid"];
                  $stmt = $link->prepare("SELECT * FROM required_amounts WHERE clintid = :jid");
                  $stmt->bindParam(':jid', $jordanid);
               
                  $stmt->execute();
                  $arrPays = $stmt->fetch(PDO::FETCH_ASSOC);
                  $name;
                  $OrgialTotal="null";
                  $monthg="null";
                  $tdated="null";
                  $mpay=0;
                  if ($arrPays !=null) {
              $OrgialTotal=$arrPays["total"];
              $monthg=$arrPays["monthg"];
              $tdated=$arrPays["tdated"];
            $mpay=$OrgialTotal/$monthg;}
                  
                  ?>
            <div class="form-group">

                <div class="col-xs-6">
                    <label for="first_name">
                        <h4>القيمة المطلوبة</h4></label>
                    <input type="text" class="form-control" name="total" id="first_name"  value="<?php echo $OrgialTotal;?>" disabled>
                </div>
            </div>
            <div class="form-group">

                <div class="col-xs-6">
                    <label for="last_name">
                        <h4> يوم الاستحقاق</h4></label>
                    <input type="text"  class="form-control" name="last_name" id="last_name"  title="enter your last name if any." value="<?php echo $tdated." من كل شهر";?>" disabled>
                </div>
            </div>

            <div class="form-group">

                <div class="col-xs-6">
                    <label for="phone">
                        <h4> عدد الاشهر</h4></label>
                    <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $monthg;?>" disabled>
                </div>
            </div>

            
            <div class="form-group">

<div class="col-xs-6">
    <label for="phone">
        <h4>  قيمة الدفعة الشهرية</h4></label>
    <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $mpay ." JD";?>" disabled>
</div>
</div>

            
            <!-- <div class="form-group">
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                </div>
            </div> -->

      
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
            <input type="number"   name="total" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"> عدد الاشهر</label>
            <input type="number"   name="months"  class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">يوم الاسنحقاق</label>
            <select class="form-select" name="date" aria-label="Default select example"  id="select">
  
          
<script>
let num = document.getElementById("select");

for (let index = 1; index < 29; index++) {

  let option = document.createElement("option");
  option.value=index;
  option.innerHTML=index;
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
        <input type="number"   name="amount" class="form-control" id="recipient-name">
      </div>
    


      <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
    <button name="submit2" type="submit" class="btn btn-primary"> اضافة</button>
  </div>
    </form>
  </div>

</div>
</div>
















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>



<?php 

$date=date("Y-m-d h:i:sa");
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
?>