<?php

include("read_and_export.php");
include "head.php";

?>

<!DOCTYPE html>
<html>
<head>
<title>Export MySQL Data to Excel using PHP</title>
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
 value="Export to excel" class="btn btn-success">Export To Excel</button>
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
<?php } ?>
</tbody>
</table>
</div>

</body>
</html>
