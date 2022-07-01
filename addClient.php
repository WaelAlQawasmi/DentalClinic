<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    <!-- navbar -->


    <?php
    include "head.php"; ?>
    <!-- nav-->

    <div class="container">
        <h3 style="
        border: 1px solid #00a1ff;
        padding: 5vh;
        border-radius: 73px;
        /* font-size: 1rem; */
        font-style: inherit;
        padding-top: 2%;
        text-align: center;
        "> بيانات العميل</h3>

        <!--     details form -->






        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">الإسم الثلاثي</label>
                <input type="text" class="form-control" name="name" id="inputEmail4" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">الرقم الوطني</label>
                <input type="number" name="jordanid" class="form-control" id="inputPassword4" required>
            </div>
            <div class="col-6">
                <label for="inputAddress" class="form-label">رقم الهاتف</label>
                <input type="number" name="phone" class="form-control" id="inputAddress" required>
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">مكان السكن</label>
                <input type="text" name="address" class="form-control" id="inputAddress2" required>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">الوظيفة</label>
                <input type="text" name="job" class="form-control" id="inputCity" required>
            </div>

            <div class="col-md-6" style="
        margin-top: 3vh;
    ">
                <div class="form-check form-check-inline">
                    <select name="sex" class="custom-select" id="inputGroupSelect01" required>
                        <option> </option>
                        <option value="ذكر">ذكر</option>
                        <option value="انثى">انثى</option>

                    </select>
                </div>

                <div class="col-12" style="
        text-align: center;
        margin-top: 10vh;
    ">
                    <button name="submit_add_user" type="submit" class="btn btn-primary">تسجيل</button>

                </div>
        </form>
    </div>

</body>


<?php

include "DBconnection.php";
include "./functionality.php";

?>