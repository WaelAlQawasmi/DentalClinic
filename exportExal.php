<?php

include("read_and_export.php");
include "head.php";

?>

<!DOCTYPE html>
<html>
<head>
<title>Export MySQL Data to Excel using PHP</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet"
 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
<center><br/><br/><h2
 style='color:green'>النسخة الاحتياطية</h2></center>
<div class="col-sm-12">
<div>
<form action="#" method="post">
<button type="submit" id="export" name="export" 
 value="Export to excel" onclick="hideExalViowEmailBtn()" class="btn btn-success">Export Excel</button>

 <button    onclick="sendEmail()"
 value="Export to excel" style="display:none;"  id="email" class="btn btn-danger">send Excel via email</button>
</form>
</div>
</div>
<br/>
<table id="" class="table table-striped table-bordered">
<tr>

<th>الاسم</th>
<th>الرقم الوطني</th>
<th>رقم الهاتف</th>
<th>العنوان</th>
<th>اجمالي المبلغ</th>
<th>يوم الاستحقاق</th>
<th>المبلف المدفوع</th>
</tr>
<tbody>
<?php foreach($items as $item) { ?>
<tr>

<td><?php echo $item ['name']; ?></td>
<td><?php echo $item ['jordanid']; ?></td>
<td><?php echo $item ['phone']; ?></td>
<td><?php echo $item ['address']; ?></td>
<td><?php echo $item ['required_amount']; ?></td>
<td><?php echo $item ['the_day']; ?></td>
<td><?php echo $item ['paid']; ?></td>
</tr>
<?php }  
?>
</tbody>
</table>
</div>

</body>


<script type="text/javascript">

function proxy() {


    $.ajax({
        type: "Get",
        url: "./mailer/mailer/index.php",
        dataType: "json",
        success: function(data) {
            // alert(data.status);


        },
        error: function() {
            alert("تم الارسال");
        }
    });
}


function sendEmail(){
    setTimeout(proxy(), 3000);
 // last arg is in milliseconds
}

function hideExalViowEmailBtn(){
document.getElementById("export").style.display = "none";
document.getElementById("email").style.display = "inline";
 // last arg is in milliseconds
}
</script>
</html>
