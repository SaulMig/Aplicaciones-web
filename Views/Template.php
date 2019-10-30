<?php

namespace Views;
new Template();
ob_start();
class Template
{
    public static function header()
    {
?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta charset="utf-8">
            <title>Cooper Standard</title>

            <link type="text/css" href="<?php echo URL ?>Public/css/login.css" rel="stylesheet">
            <link type="text/css" href="<?php echo URL ?>Public/css/style3.css" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo URL ?>Public/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo URL ?>Public/css/sweet-alert.min.css">

            <link type="text/css" href="<?php echo URL ?>Public/css/glyphicons.css" rel="stylesheet">
            <script type="text/javascript" src="<?php echo URL ?>Public/js/sweet-alert.min.js"></script>
            <script type="text/javascript" src="<?php echo URL ?>Public/js/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="<?php echo URL ?>Public/js/bootstrap.min.js" ></script>
            <script type="text/javascript" src="<?php echo URL?>Public/js/highcharts.js"></script>
            <script type="text/javascript" src="<?php echo URL?>Public/js/jquery.validate.min.js"></script>

        </head>

        <body>
            
            <?php if(!isset($_SESSION["email"])) { ?>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background: #2196f3 ;" >
            <div class="container">
                <a class="navbar-collapse" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL ?>inicio">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo URL?>login" class="brand-logo"><img src="Public\img\cs.png" width="60px" height="50px"/></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

            <?php } if (isset($_SESSION["email"])){ ?>

            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #2196f3 ;">
                <ul class="navbar-nav px-3">
                    <li class="nav-item text-nowrap">
                        <a class="nav-link " href="#menu-toggle" id="menu-toggle">Menu
                        </a>
                    </li>
                </ul>
            </nav>

            <div id="wrapper" data-spy="scroll">
                <div id="sidebar-wrapper" style="background: #2196f3 ;" >
                    <ul class="sidebar-nav">

                        <li class="sidebar-brand">
                            <a href="#"></a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Empleado_bienvenido">Inicio</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Desktops">Desktop</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Laptop">Laptop</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Display">Display</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>keyboard">Keyboard</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Mouse">Mouse</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Usuario">Usuarios</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Equipo_OP">Equipo Oficina/Piso</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Area">Lugar</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Marca">Marca</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Modelo">Modelo</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>Scanner">Scanners</a>
                        </li>
                        <li>
                            <a href="<?php echo URL?>PrintLabel">Print Labels</a>
                        </li>
                        <li>
                            <a href="<?php echo URL ?>login/logout">Salir</a>
                        </li>

                    </ul>
                </div>
            </div>
            <script>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            </script>

    <?php } ?>
            <main class="container-fluid">
            <br>
            <br>
            <br>

    <?php
    }

    public static function footer()
    {
    ?>
            </main>
        <footer class="py-5"style="background: #ffb300">
            <div class="container">
                <p class="m-0 text-left text-white">Dirección: Calle Num. 17, Sin Numero Zona Industrial, Atlacomulco Estado de México, 50450 </p>
                <p class="m-0 text-left text-white">Teléfono: 011 52 712 222 9400</p>

            </div>
        </footer>
        </body>
        </html>
        <?php
    }
}
ob_start();