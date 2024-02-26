<?php
include("linkit2.php");
?>
<a href="main_login.php">Log in</a> |
<a href="default.php">Etusivu</a>

<html>
<head>
<style>
#text {display:none;color:red}
</style>
</head>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" border=1>
<tr>
<form name="form1" method="post" action="check_login.php">
<td>
<table width="100%" border="0" cellpadding="6" cellspacing="1"
bgcolor="#FFFFFF">
<tr>
<td colspan="6"><strong>Log in  </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="294"><input name="myusername" type="text" id="myusername"/>
</td>
</tr>
<tr>
<td>Password</td>
<td><input name="mypassword" onkeypress="capsLock(event)"  type="password" id="mypassword"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Log in"/></td>
</tr>
<tr>
<td> 
<p id="text" >Caps lock is on. </p>
</td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<script type="text/javascript">

/*
document.getElementById("mypassword").onkeypress = function() {myFunction()};

function myFunction() {
    document.getElementById("mypassword").style.backgroundColor = "red";
*/
}

</script>

<script>

// Tee punainen tekstiruutu
// jos huomaat 
// capslokin olevan päällä. Testaa capslokin päällä oleminen

var input = document.getElementById("mypassword");
var text = document.getElementById("text");
input.addEventListener("keyup", function(event) {

if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
document.getElementById("mypassword").style.backgroundColor = "red";
  } else {
    text.style.display = "none"
    document.getElementById("mypassword").style.backgroundColor = "rgba(255, 255, 255, 0.5)";

  }
});

</script>
</html>
