<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include "menu.php";
$idclase=15;
if (isset($_GET["idclase"])){
    $idclase=$_GET["idclase"];   
}
?>
<br>
<div class="container">
 
</div>
 
</body>

</html>
