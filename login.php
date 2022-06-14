<?php
include "DBconnection.php"; ?>

<!DOCTYPE html>
<html>

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
  <link rel="stylesheet" href="css/styleLogin.css">
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
        <div class="g-recaptcha" style="  
   
    border: 0px; margin-top: 10vh;" data-sitekey="6LcwgMsZAAAAADPSjYm8ZxxjdkrdQxyHepjPlvJs
"></div>
      </form>

      <?php
    
      if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['username']); //xss
        $pass = htmlspecialchars($_POST['password']); //xss
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
          $url = " https://www.google.com/recaptcha/api/siteverify";
          $pap_k = "6LcwgMsZAAAAADPSjYm8ZxxjdkrdQxyHepjPlvJs";
          $secretAPIkey = '6LcwgMsZAAAAAOm2MIDmGMhlZ3rXq0EEUBLKAai';

          // reCAPTCHA response verification
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LcwgMsZAAAAAOm2MIDmGMhlZ3rXq0EEUBLKAai-&response=' . $_POST['g-recaptcha-response']);
          $us = $_POST["username"];
          // echo  $verifyResponse;
          // echo $_POST['g-recaptcha-response'];
          $password = $_POST["password"];
          $response = json_decode($verifyResponse);

          $_SESSION['username'] = $us;
          if (isset($_POST["login"])) {      //if($response->success){
            $count = 0;
            //$res = mysqli_query($link,"SELECT * FROM exam WHERE username = '$_POST[username]'   && password = '$_POST[password]' " ) ;

            $stmt = $link->prepare("SELECT * FROM users WHERE username = :nam  && password = :pass ");
            $stmt->bindParam(':nam', $us);
            $stmt->bindParam(':pass', $password);
            $stmt->execute();
            $arr = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$arr) {



              // current time
              date('h:i:s');

              // sleep for 10 seconds
              sleep(10);

              // wake up !
              date('h:i:s');

      ?>
              <script type="text/javascript">
                document.getElementById("filer").style.display = "inline";
              </script>
            <?php
              exit('No rows');
            } else {
            ?>

              </script>
              <script type="text/javascript">
                window.location = "dashboard.php";
              </script>

              </script>
            <?php }
          }
           else {


            ?> 

            <script type="text/javascript">
              document.getElementById("cap").style.display = "inline";
            </script>
        <?php

          }
        }
      } 
      else {
        ?>

        <script type="text/javascript">
          document.getElementById("bot").style.display = "inline";
        </script>
      <?php
      }



      ?>
    </div>
  </div>
  <script src="js.js"></script>
</body>

</html>