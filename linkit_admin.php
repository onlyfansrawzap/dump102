<style type="text/css">
body{ background-color:#D0D0D0;}
input[type="submit"] {
margin-left:20px;
}
input[type="text"] {
margin-left:20px;
}
 .formLayout
    {
        background-color: #f3f3f3;
        border: solid 1px #a1a1a1;
        padding: 10px;
        width: 500px;
    }
    
    .formLayout label, .formLayout input
    {
        display: block;
        width: 180px;
        float: left;
        margin-bottom: 10px;
    }
 
    .formLayout label
    {
        text-align: right;
        padding-right: 20px;
    }
 
    br
    {
        clear: left;//found another
    }
</style>
<body>

<?php

session_start();

if (empty($_SESSION['myusername'])){
    // session user does not exist
    header("location:main_login.php");
} 

else {

?>

<a href="print.php">Näytä ilmoitukset</a> |
<a href="print_admin.php">Näytä ilmoitukset tietokannassa</a> |
<a href="edit_data.php">Editoi ilmoitusta tietokannasta</a>
<a href="delete_data.php">Poista ilmoitus tietokannasta</a>
<a href="insert_data.php">Lisää ilmoitus tietokantaan</a>
<a href="insert_data2.php">Lisää ilmoitus</a>
<a href="logout.php">Log out</a>

<?php

}//else empty session

?>

</body>
