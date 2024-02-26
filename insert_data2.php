<link rel="stylesheet" href="cssmain.css" type="text/css">





<?php




include("linkit.php");
require("dbinfo.php");



 $idarvo = 0;

//poimitaan arvoja aiemmilta sivuilta
session_start();
echo $_SESSION['myusername'];
echo $_SESSION['mypassword'];

if (empty($_SESSION['myusername'])){
    // session user does not exist
    header("location:main_login.php");
} else {



    $idarvo = 0;
    $sql="SELECT kayttaja.id, kayttaja.salasana FROM kayttaja WHERE kayttaja.nimi = '". $_SESSION['myusername'] . "'";

if ($result=mysqli_query($con,$sql) or die("Kysely ei toiminut nyt.")){
   while ($row=mysqli_fetch_row($result)){

//echo "<tr>";

echo "<td>". $row[0] . "</td>" . "<td>". $row[1] ."</td>"."<td> ". $row[2]. "</td>";

//id arvon selvitys
$idarvo = $row[0];
//echo "</tr>";


}//else
}//if

}//while

//mysqli_free_result($result);
//mysqli_close($con);

?>
Insert some data here:<br><br>
<form method="Get">
<div class="formLayout">
        <br>
        <label>Name</label>
        <input id="name" name="nimi" value="<?php echo $_SESSION['myusername']; ?>"><br>
        <label>Data (ilmoitus) </label> </br>
        <textarea rows="10" cols="50" id="Text1" name="teksti"></textarea><br>
        <label>Kayttajaid </label>
        <input id="kayttajavalue" name="kayttajaid" value="<?php echo "". $idarvo . ""; ?>"><br>
       
	<input type="submit" value="Send information to the Db">
        <br>
    </div>
</form>
<?php



$sql="SELECT kayttaja_ilmoitus.ilmoitus FROM kayttaja_ilmoitus WHERE kayttaja_ilmoitus.kayttajaid =

" . "'" . $idarvo . "'" ;

$insert_nimi = $_GET["nimi"];
$insert_teksti=$_GET["teksti"];
$insert_kaytid=$_GET["kayttajaid"];


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
$dateandtime = date("Y.m.d") . " " . date("h:i:sa");

$sql2 = "insert into kayttaja_ilmoitus(ilmoitus, kayttajaid, pvm) values ('$insert_teksti', '$insert_kaytid', '$dateandtime')";

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
  
