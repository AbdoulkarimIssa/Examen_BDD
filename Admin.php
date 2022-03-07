<?php

session_start();

if(!$_SESSION['loggedin']) {
  header("location: ConnexionDB2.php"); 
  die(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>ADMIN PAGE</h1>
</head>
<body>
    
</body>
</html>