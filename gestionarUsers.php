<?php
require_once "includes/config.php";
if(!isset($_SESSION["login"])){
    if($_SESSION["login"] != "true")
        header("location: index.php");
}else{
    if($_SESSION["rol"] != "admin")
        header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gestionar Usuarios</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css?v=0.0.2">
</head>

<body>

    <?php require_once "includes/topBar.php";?>

    <div class="contenido">
        <?php   require_once "includes/listaUsers.php" ?>

    </div>
</body>

</html>