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

<a href="print.php">Print</a>
<a href="print2.php">Print2</a>
<a href="edit_data.php">Edit data</a>
<a href="edit_user.php">Edit user</a>
<a href="delete_data.php">Delete data</a>
<a href="delete_user.php">Delete user</a>
<a href="insert_data.php">Insert data</a>
<a href="upload.php">Upload an image</a>
<a href="insert_user.php">Insert user</a>
<a href="logout.php">Log out</a>

<?php

}//else empty session

?>

</body>
