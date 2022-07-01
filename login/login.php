<!DOCTYPE html>
<html>
<?php
session_start(); 
include "login_action.php";
?>
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
  <meta name="description" content="DC-Team Portal" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
  <link rel="icon" href="edu/img/logo.jpg">
  <link rel="shortcut icon" href="https://dc-team.team/images/dc5.png">
  <link rel="apple-touch-icon" href="https://dc-team.team/images/dc5.png">
  <meta property="og:url" content="https://dc-team.team/images/dc5.png" />
  <meta property="og:title" content=" DC-Team " />
  <meta property="og:description" content="DC-Team Portal" />
  <meta property="og:url" content="https://dc-team.team/images/dc5.png" />
  <meta property="og:image" content="https://dc-team.team/images/dc5.png" />
  <title> DC-Team </title>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js?hl=ar" async defer></script>
  <link rel="stylesheet" href="../css/styleLogin.css">
</head>

<body>
  <div id="pop">
    <div id="black-layer">



      <form name="formal" method="post" onsubmit="return validateForm()">
        <h1> The Portal </h1>
        <div class="input">
          <label> username</label>
          <input type="text" require class="user" id="user" name="username" oninput="io()" onchange="document.activeElement.blur();">
        </div>
        <div class="input">
          <label> password</label>
          <input class="user" require type="password" name="password">
        </div>

        <button type="submit" name="login"> login</button>
        <span class="alart" style="display:none;" id="filer"> اسم المستخدم او الرقم السري خطأ</span>
        <span class="alart" id="bot"> <strong> ربوت</strong>الرجاء اثبات انك لست</span>
        <span class="alart" id="cap"> <strong> لقد ادخلت بيانات الربوت بشكل خاطئ</strong> </span>
        <div class="g-recaptcha" style=" border: 0px; margin-top: 10vh;" data-sitekey="6LcwgMsZAAAAADPSjYm8ZxxjdkrdQxyHepjPlvJs"></div>
      </form>


    </div>
  </div>
  <script src="../js/js.js"></script>
</body>



</html>