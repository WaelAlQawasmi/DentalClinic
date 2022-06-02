
 <?php
 session_start();
 if(!isset($_SESSION['username']))
 {
     ?>
     <script type="text/javascript">
     window.location="index.html";
     </script>
     <?php
 }
 ?>

 <!doctype html>
<html lang="ar" dir="rtl">
<head>
<title>DC-team</title>
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
  





<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./dashboard.php">الصفحة الرئيسية </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./allclients.php" >العملاء</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">إحصائيات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">إشعارات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">تسجيل خروج</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav-->
    <script src="js/dash.js"></script>
    </body>
        </html>
  