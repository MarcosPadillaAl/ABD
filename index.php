<?php
require_once __DIR__ . '/includes/config.php';
if(isset($_SESSION['login']))
    if($_SESSION['login'] == true)
        header("location: home.php");
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <img src="images/bici.png" id="logoIndex">
    <div class="loginBox">
        <h2>Regístrate</h2>
        <hr>
        <form action="includes/procesarRegistro.php" method="post" class="loginForm">
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Tu nombre" required>

            <label>Email:</label>
            <input type="email" name="email" placeholder="example@gmail.com" required>

            <label>Contraseña:</label>
            <input type="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>

            <label>Repite la Contraseña:</label>
            <input type="password" name="password2" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>

            <span class="loginMsg">
                <?php
                if (isset($_GET['passNotMatch']))
                    if ($_GET['passNotMatch'])
                        echo 'Las contraseñas no coinciden';

                if (isset($_GET['userExists']))
                    if ($_GET['userExists'])
                        echo 'Ya existe un usuario con ese email';

                if (isset($_GET['signUpOK']))
                    if ($_GET['signUpOK'])
                        echo 'Ya puedes iniciar sesión';
                ?>
            </span>

            <input type="submit" class="subBtn" value="Registrarme">
        </form>
    </div>

    <div class="loginBox">
        <h2>Inicia sesión</h2>
        <hr>
        <form action="includes/procesarLogin.php" method="post" class="loginForm">
            <label>Email:</label>
            <input type="email" name="email" placeholder="example@gmail.com" required>

            <label>Contraseña:</label>
            <input type="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>

            <span class="loginMsg">
                <?php
                if (isset($_GET['signInOK']))
                    if ($_GET['signInOK'] == 'false')
                        echo 'Usuario o contraseña incorrectos';
                ?>
            </span>

            <input type="submit" class="subBtn" value="Iniciar sesión">
        </form>
    </div>
</body>

</html>