<?php
include("linkit.php");
session_start();

echo $_SESSION['myusername'];
echo $_SESSION['mypassword'];

$_SESSION['login_time'] = time();


if (empty($_SESSION['myusername'])){
    // session user does not exist
    header("location:main_login.php");
} else {
    
    ?>
    
    <html>
<body>
Login Successful
</body>
</html>

<?php

}

//if(!session_is_registered(myusername)){

//}

?>

