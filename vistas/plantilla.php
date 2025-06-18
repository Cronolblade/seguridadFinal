<?php
#Le dice al navegador que voy a trabajar con variables session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Vista Controlador</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <!-- Font wesome free-->
    <link rel="stylesheet" href="../assets/fontawesome-free-6.4.2-web/css/all.min.css">
</head>

<body>
    <!--Logotipo-->
    <div class="container-fluid">
        <center>
            <img src="../assets/images/logo1000.png" alt="" width="150px">
        </center>
    </div>
    <!--Fin logotipo-->

    <!--Botonera-->
    <div class="container-fluid bg-light">
        <div class="container">
            <ul class="nav nav-justified py-2 nav-pills">
                <?php if (isset($_GET['pagina'])): ?>
                    <!--preguntamos si la variable GET no es NULL-->
                    <!--Pagina de registro-->
                    <!--Preguntamos si la variable Get trae el valor de registro-->
                    <?php if ($_GET['pagina'] == "registro"): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=registro">Registro</a>
                        </li>
                    <?php endif; ?>

                    <!--Pagina de ingreso-->
                    <?php if ($_GET['pagina'] == "ingreso"): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php endif; ?>

                    <!--Pagina de inicio-->
                    <?php if ($_GET['pagina'] == "inicio"): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
                        </li>
                    <?php endif; ?>

                    <!--Pagina Salir-->
                    <?php if ($_GET['pagina'] == "salir"): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=salir">salir</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=salir">salir</a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=salir">salir</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!--Fin botonera-->

        <!--Contenido-->
        <div class="container-fluid">
            <!--PY-5:separamos la barra de navegación del contenido-->
            <div class="container py-5">
                <?php #isset: determina si la variable esta definida y no es NULL
                if (isset($_GET["pagina"])) { #si la variable no es NULL
                    if (
                        $_GET["pagina"] == "registro" ||
                        $_GET["pagina"] == "ingreso" || #|| se saca con Alt+124
                        $_GET["pagina"] == "inicio" ||
                        $_GET["pagina"] == "editar" ||
                        $_GET["pagina"] == "salir"
                    ) {
                        include "paginas/" . $_GET["pagina"] . ".php";
                    } else {
                        include "paginas/error404.php";
                    }
                } else { #si no esta declarada que siempre me incluya la pagina registro
                    include "paginas/registro.php"; #Pagina por defecto
                }
                ?>
            </div>
        </div>
        <!--Fin Contenido-->

        <script src="../assets/bootstrap-4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>