<style type="text/css">

body
{
        background-color: #D0D0D0;
        border: solid 1px black;
	margin:5px
}
table,tr,td,#links{
border: solid 1px black;
}

</style>
<body>

<div id="links">

<?php
include("linkit.php");

//if(time() - $_SESSION['login_time'] >= 1800){        
  //  header("Location: logout.php");
    
    //redirect if the page is inactive for 30 minutes

//}

//else {        

//   $_SESSION['login_time'] = time();
  
   // update value of session

//}


?>

</div><br><br>

<?php // esimerki mite tulosta tietokana taulusta yks riviline

require("dbinfo.php");
/*$con=mysqli_connect("localhost","u745566566_ytuma","testi4","u745566566_aquzy");

if (mysqli_connect_errno($con)){
  echo "Ee toemee" . mysqli_connect_error();
} 
*/

//header("Location: http://www.aalthonen.xyz/testi5/print.php");


//$sql="SELECT id, tieto FROM tbl_lista";

$sql="SELECT kayttaja.nimi, kayttaja_ilmoitus.ilmoitus, kayttaja_ilmoitus.pvm FROM kayttaja JOIN kayttaja_ilmoitus ON kayttaja.id = kayttaja_ilmoitus.kayttajaid";
//order by id desc

//echo "Tutorial: PHP / SQL: Hi, we have a SQL that we are querying with: " . $sql . ". It is a regular way of many websites online to provide a table of data and user then clicks links on the data.<br><br>";

//SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
//FROM Orders
//INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;

echo "<table>";
echo "<tr><th>Käyttäjän nimi</th><th>Käyttäjän ilmoitus</th><th>Pvm</th></tr>";
if ($result=mysqli_query($con,$sql)){
   while ($row=mysqli_fetch_row($result)){
	$i++;

	if($i % 2 ==0) { //jos i jaettuna 2:lla jakojäännös on 0, eli parillisia ja parittomia etsitään

	echo "<tr style='background-color:#ffffff'>";
	echo "<td width='10%'>". $row[0] . "</td>" . "<td width='50%'>". $row[1] ."</td>"."<td width='10%'> ". $row[2]. "</td>";
	echo "</tr>";

	} else {

	echo "<tr style='background-color:DodgerBlue'>";
	echo "<td width='10%' style='color:white'>". $row[0] . "</td>" . "<td width='50%' style='color:white'>". $row[1] ."</td>"."<td style='color:white'> ". $row[2]. "</td>";
	echo "</tr>";
	}

}
$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);

printf ("Rivit: %d \n", $rowcount);

echo "</table>";

//echo "<br>" . "eli id, otsake ja nimmari tulostuivat, ja rivei oli kai..";


   mysqli_free_result($result);
}

//code found
mysqli_close($con);
?></body>