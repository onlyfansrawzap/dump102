<?php
$host="mysql.hostinger.com"; // Host name
//$username="u745566566_ytuma"; // Mysql username
//$password="testi4"; // Mysql password
//$db_name="u745566566_aquzy"; // Database name
$tbl_name="kayttaja"; // Table name

require("dbinfo.php");

session_start();
/*$con=mysqli_connect("localhost","u745566566_ytuma","testi4","u745566566_aquzy");

if (mysqli_connect_errno($con)){
  echo "Ee toemee" . mysqli_connect_error();
}*/

// Connect to server and select database.
//mysql_connect("$host", "$username", "$password")or
//die("cannot connect");
//mysqli_select_db("$con, $db_name")or die("cannot select DB");


// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($con, $myusername);
$mypassword = mysqli_real_escape_string($con, $mypassword);

$sql="SELECT * FROM $tbl_name WHERE nimi='$myusername' and
salasana='$mypassword'";
echo $sql;
$result=mysqli_query($con, $sql);

$count=mysqli_num_rows($result);

echo $count;
//$_SESSION['myusername'] = $myusername;
//$_SESSION['mypassword'] = $mypassword;
echo $_SESSION['myusername'] = $myusername;

    
if($count==1){
    $_SESSION['myusername'] = $myusername;
    $_SESSION['mypassword'] = $mypassword;
    //session_register("myusername");
    //session_register("mypassword");
    header("location:login_success.php");
    //header('Location: http://www.aalthonen.xyz/testi8/login_success.php');
}
else {
echo "Wrong Username or Password";
}
/**/
?>

<?php
    // some php stuff
?>

