<?php

session_start();


?>
<!doctype html>
<html lang="en">

<head>
    <title>Iniciar sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Iniciar sesión</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Tienes cuenta?</h3>
                        <form class="signin-form" method="post" action="./Controllers/usuario_sesion.php">
                            <?php
                            if (isset($_GET['_!!DQjr6,'])) {
                                ?>
                                <div class="alert alert-danger">Los campos estan vacios!</div>
                            <?php } else {
                                if (isset($_GET[')-HiPdTTF'])) { ?>
                                    <div class="alert alert-danger">Usuario o contraseña incorrectas</div>
                                <?php }
                            } ?>


                            <div class="form-group">
                                <input name="user" type="text" class="form-control" placeholder="Usuario" required>
                            </div>
                            <div class="form-group">
                                <input name="pass" id="password-field" type="password" class="form-control" placeholder="Contraseña"
                                    required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input name="entrar" type="submit" class="form-control btn btn-primary submit px-3" value="INGRESAR"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>