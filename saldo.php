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
  <title>Inicio</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php require_once "includes/topBar.php"; ?>

  <div class="contenido">
    <div class="saldoBox">
      <h2>Añadir saldo</h2>
      <hr>
      <form action="includes/addSaldo.php" method="post">
        <input type="number" name="credits" min="0" class="creditsInput" required>
        <input type="submit" value="Añadir" class="addBtn">
      </form>
      <span class="creditsMsg">
        <?php
        if (isset($_GET["added"]))
          if ($_GET["added"])
            echo 'Créditos añadidos correctamente';
        if (isset($_GET["numCredits"]))
          if ($_GET["numCredits"])
            echo 'Número de créditos no válido';
        ?>
      </span>
    </div>
  </div>
</body>

</html>