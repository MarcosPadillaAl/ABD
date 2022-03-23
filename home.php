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
    <h2>¡Hola <?php echo $_SESSION['nombre'] ?>!</h2>

  </div>
</body>

</html>