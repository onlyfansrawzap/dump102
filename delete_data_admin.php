<?php
include("linkit.php");
?>

<style type="text/css">
body{ background-color:#D0D0D0;}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<body>
<p>Select an ID of the rec:</p>

<?php

session_start();

echo  "username " . $_SESSION['myusername'];
require("dbinfo.php");


//if(time() - $_SESSION['login_time'] >= 1800){        
  //  header("Location: logout.php");
    
    //redirect if the page is inactive for 30 minutes

//}

//else {        
  // $_SESSION['login_time'] = time();
   
   // update value of session

//}



$sql="SELECT kayttaja.id, kayttaja.nimi, kayttaja_ilmoitus.ilmoitus, kayttaja_ilmoitus.id  FROM kayttaja 
JOIN kayttaja_ilmoitus ON kayttaja.id = kayttaja_ilmoitus.kayttajaid 
WHERE kayttaja.nimi = '". $_SESSION['myusername'] . "'";



echo "sql " . $sql;


?>
<form method="get">
<label>ID</label>

<select id="id2" name="id">

<?php 





// kayttaja_ilmoitus WHERE kayttaja_.nimi = 
//'". $_SESSION['mypassword'] . "'";;

if ($result=mysqli_query($con,$sql)){

   while ($row=mysqli_fetch_row($result)){

//käyttäjä_ilmoitus2.id
$idarvo = $row[3];

//echo "<tr>";
echo "<option>";
echo $row[2];
echo "</option>";

echo $row[2];

//echo "<td>id: ". $row[0] . "</td>" . "<td>ni: ". $row[1] ."</td>"."<td>te: ". $row[2]. "</td>";

//echo "</tr>";
}
mysqli_free_result($result);
}
echo "</select><br>";
echo "<label>Delete the rec</label><br>";
echo "<input type='submit' value='Delete'>";
echo "</form>";
?>

<?php
//löydetty
/*$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";*/

require("dbinfo.php");


// yks id
$sql = "DELETE FROM kayttaja_ilmoitus 
WHERE kayttaja_ilmoitus.id = '" . $idarvo . "'";

//$sql="DELETE FROM kayttaja_ilmoitus where kayttajaid= " . "'" . $_GET['id'] . "'";
echo $sql;
//$sql = "DELETE FROM MyGuests WHERE id=3";

if (isset($_GET["id"])) {
$idget=$_GET["id"];
print "Thanks";

if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}


}//found



$conn->close();
?>
</body>