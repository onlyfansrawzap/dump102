<?php
include("linkit.php");
session_start();

date_default_timezone_set("Europe/Helsinki");
$dateandtime = date("Y.m.d") . " " . date("H:i:s");

require("dbinfo.php");

$sql = $sql="SELECT kayttaja.id, kayttaja.nimi, kayttaja_ilmoitus2.ilmoitus FROM kayttaja 
JOIN kayttaja_ilmoitus2 ON kayttaja.id = kayttaja_ilmoitus2.kayttajaid 
WHERE kayttaja.nimi = '". $_SESSION['myusername'] . "'";

echo "sql " . $sql;


if (empty($_SESSION['myusername'])){
    // session user does not exist
    header("location:main_login.php");
} else {
    
?>

<form method="get">
<label>Ilmoitus</label>
<input type="text" cols="30" rows="10" name="name">
<!--<label>Salasana</label>
<input type="password" name="kuvaus">-->
<label>Pvm</label>
<input type="text" cols="30" rows="10" name="pvmname" value="<?php echo $dateandtime ?>" readonly>

<label>Vanhempi Ilmoitus</label>

<select id="id2" name="id">

<?php 

//$sql="SELECT id FROM kayttaja";

if ($result=mysqli_query($con,$sql)){

   while ($row=mysqli_fetch_row($result)){

$SESSION['myuserid'] = $row[0];

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
echo "<label>Edit</label><br>";
echo "<input type='submit' value='Edit'>";
echo "</form>";

if (isset($_GET['name']) || isset($_GET['id']) || isset($_GET['kuvaus']) ){
$uusinimiget=$_GET['name'];
$idget=$_GET['id'];
$uusikuvausget=$_GET['kuvaus'];
$pvmnameget = $_GET['pvmname'];
//echo $uusinimiget;
//echo $idget;


if($uusinimiget==null) { //|| $uusikuvausget==null){
echo "<font color='red'> Were the text boxes empty? </font>";
}//is null
else { 
}


echo $sql;





//if (ctype_alnum($uusinimiget)) //&& ctype_alnum($uusikuvausget)) 
//{

echo "myid" . $SESSION['myuserid'];

//sql = "UPDATE kayttaja_ilmoitus SET ilmoitus = " . "'" . $uusinimiget . "'" . "' AND kayttaja_ilmoitus.pvm = '" . $dateandtime . " 
//WHERE kayttaja_ilmoitus.ilmoitus = '" . $idget . "'";

$sql = "UPDATE kayttaja_ilmoitus2 SET ilmoitus = " . "'" . $uusinimiget . "'" . ", kayttaja_ilmoitus2.pvm ='" . $pvmnameget . "' WHERE kayttaja_ilmoitus2.kayttajaid = '" . $SESSION['myuserid'] . "'" . " AND kayttaja_ilmoitus2.ilmoitus = '" . $idget . "'";

 

//$sql2 = "UPDATE kayttaja_ilmoitus SET pvm = " . "'" . $dateandtime . "' WHERE kayttaja_ilmoitus.ilmoitus = '" . $idget "'"; 

echo $sql;
//$sql = "UPDATE prof SET ni='terppa' WHERE id=27";

if ($con->query($sql) === TRUE || $con->query($sql2) == TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}


    
    
    
//} //ctype
// else {
//echo "<font color='red'> az and 09 </font>";
//}

//else empty session
}

$con->close();
}// if
?>