<?php




if (!empty($_POST['username']) && !empty($_POST['password'])&& recapcha()) {//to check that no thing empty

    $name = htmlspecialchars($_POST['username']); //xss
    $pass = htmlspecialchars($_POST['password']); //xss

   

        if (isset($_POST["login"])) {
            login($name, $pass);
        } else {
          
        }
   
} else {
    echoJs("bot");
   
}







function recapcha()
{
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

        return true;
    } else {
        return false;
    }
}




function login($username, $password)
{
    include "../DBconnection.php";

    $stmt = $link->prepare("SELECT * FROM users WHERE username = :nam  && password = :pass ");
    $stmt->bindParam(':nam', $username);
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

        echoJs("filer");


    } else {
        session_start();
        $_SESSION['username'] =  $username;
    ?>

       
        <script type="text/javascript">
            window.location = "../dashboard.php";
        </script>

       
<?php }
}


function echoJs($element){
    echo  "<script type=\"text/javascript\">
    document.getElementById(\"$element\").style.display = \"inline\";
</script>";

}

?>