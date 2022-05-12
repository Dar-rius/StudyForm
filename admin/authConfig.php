<?php
include '../config.php';

session_start();

$query = "SELECT * FROM admins WHERE adminName = :adminName AND password = :password";  
$statement = $bd->prepare($query);  
$statement->execute(  
        array(  
            'adminName'     =>     $_POST["adminName"],  
            'password'     =>     $_POST["password"]  
        )  
);  
$count = $statement->rowCount();  
if($count > 0)  
{  
        $_SESSION["adminName"] = $_POST["adminName"];  
        header("location: ./admin.php");  
}  
else  
{  
        echo '<label>Wrong Data</label>';  
}  
   