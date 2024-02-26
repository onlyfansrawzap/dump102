<link rel="stylesheet" href="cssmain.css" type="text/css">





<?php




include("linkit.php");
require("dbinfo.php");



?>


Insert some data here:<br><br>
<form method="Get">
<div class="formLayout">
        <br>
        <label>Name</label>
        <input id="name" name="nimi" value=""><br>
        <label>Data (ilmoitus) </label> </br>
        <textarea rows="10" cols="50" id="Text1" name="teksti"></textarea><br>
        <label>Kayttajaid </label>
        <input id="kayttajavalue" name="kayttajaid" value=""><br>
       
	<input type="submit" value="Send information to the Db">
        <br>
    </div>
</form>
<?php




$insert_nimi = $_GET["nimi"];
$insert_teksti=$_GET["teksti"];
//$insert_kaytid=$_GET["kayttajaid"];


if($insert_nimi==null || $insert_teksti==null || $insert_kaytid==null) {
echo "<font color='red'> Were the text boxes empty? </font>";
} else {



if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("Result set has %d rows.\n",$rowcount);
  
  if($rowcount == 0) { //nyt luodaan uusi 
  
  date_default_timezone_set("Europe/Helsinki");
$dateandtime = date("Y.m.d") . " " . date("H:i:s");

$sql2 = "insert into kayttaja(ilmoitus, id, pvm) values ('$insert_teksti', '', '$dateandtime')";

echo "Here we have a query: " . $sql . "and " . $sql2 . "<br>";

$result2 = mysqli_query($con,$sql2) or die("Insert2 ei onnistunut " . mysqli_error($con));

  
  
  } else { // ei luoda enempää
  
      echo "Ilmoitus loytyy jo.";
  } 
  
  }
  // Free result set
  mysqli_free_result($result);
  
}//insert nimi else
  ?>
  
