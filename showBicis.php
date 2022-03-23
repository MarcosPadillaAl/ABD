<?php
require_once "includes/config.php";
if(!isset($_SESSION["login"])){
    if($_SESSION["login"] != "true")
        header("location: index.php");
}else{
    if($_SESSION["rol"] != "general")
        header("location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Catálogo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require_once "includes/topBar.php"; ?>

    <div class="contenido">
        <h2>Selecciona la bici que quieras alquilar</h2>
        <div class="catalogo">
            <?php
            $collection = $db->bicicletas;
            $bicicletas = $collection->find(array('estado' => 'disponible'));

            
            foreach ($bicicletas as $bic) {
                echo '
            <div class="catalogo-item" onclick="reservar(\'includes/reservarBici.php?id=' . $bic["id"] . '\')">
                <b>' . $bic["id"] . '</b>
                <br> <span class="disponible">disponible</span>
                <br><img src="images/bicicleta.png" class="catalogo-image">
                <br><span class="catalogo-precio">' . $bic["precio"] . ' créditos</span>
            </div>';
            }
            if(isset($_GET['saldo']))
                if($_GET['saldo'] == "false")
                    echo'<script type="text/javascript">
                    alert("No tienes suficiente saldo");
                    window.location.href="showBicis.php";
                    </script>';
            ?>

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

        function reservar(url) {
            if (confirm("¿Quieres reservar esta bici?")) {
                document.location = url;
            }
            else document.location = "";
        }
    </script>
</body>

</html>