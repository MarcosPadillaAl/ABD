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
    <title>Gestionar Bicicletas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require_once "includes/topBar.php"; ?>

    <div class="contenido">
        <div>
            <div id="newBike">
                <button onclick="newBike()" class="subBtn">Añadir bici</button>
            </div>

            <?php require_once "includes/listaBicis.php";
            if(isset($_GET['reservada']))
                if($_GET['reservada'] == "true")
                    echo'<script type="text/javascript">
                    alert("No se puede eliminar una bici que se encuentra reservada");
                    window.location.href="gestionarBicis.php";
                    </script>';?>
        </div>


    </div>
    <script>
    function newBike() {
        var milliseconds = new Date().getTime();
        document.getElementById("newBike").innerHTML = `
                <form method="post" action="includes/addBici.php?biciId=bici_${milliseconds}">
                    <label>Id</label>
                    <input type="text" value="bici_${milliseconds}" disabled>
                    <label>Precio</label>
                    <input type="number" min="0" name="precio" value="0" required>
                    <input type="submit" value="Añadir" class="addBtn">
                </form></div>`;
    }
    </script>
</body>

</html>