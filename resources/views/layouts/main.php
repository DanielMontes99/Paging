<?php

function head($ua = null) {

    !is_null($ua) ? $ua->sessionValidate() : null ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons|Material+Icons+Outlined" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="/RepoPaging/resources/css/material-kit.css">
    <title>Paging</title>
</head>
<body class="main-page sidebar-collapse">
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/RepoPaging">Paging</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Intercambiar navegacion">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
            <?php if(!is_null($ua) && $ua->sv){ ?>
                <li class="nav-item active">
                    <a href="/RepoPaging/resources/views/publicaciones.php" class="nav-link">Mis publicaciones</a>
                </li>
            <?php } ?>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                <?php if(is_null($ua) || !$ua->sv){ ?>
                    <button class="nav-link btn btn-link" type="button" onclick="app.view('login')"><i class="fas fa-user"></i> Iniciar Sesión</button>
                <?php } else { ?>
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> 
                        <?=$ua->user_Alias?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <button type="button" class="dropdown-item" onclick=""><i class="fas fa-user"></i> Mi Perfil</button>
                        <button type="button" class="dropdown-item" onclick=""><i class="fas fa-cog"></i> Configuración</button>
                        <button type="button" class="dropdown-item" onclick="app.view('logout')"><i class="fas fa-power-off"></i> Cerrar Sesión</button>
                    </div>
                <?php } ?>  
                </li>
            </ul>
        </div>
    </nav>-->
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="/RepoPaging">
            Paging</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
       
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <?php if(!is_null($ua) && $ua->sv){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="material-icons">home</i> Inicio
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="material-icons">public</i> Explorar
                    </a>
                </li>

                <li class="dropdown nav-item">
                    <?php if(is_null($ua) || !$ua->sv){ ?>
                    <button class="nav-link btn btn-link" type="button" onclick="app.view('login')"><i class="material-icons"></i> Iniciar Sesión</button>
                    <?php } else { ?>
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="material-icons">account_circle</i> <?=$ua->user_Alias?>
                    </a>
                    <div class="dropdown-menu dropdown-with-icons">
                        <button type="button" class="dropdown-item btn btn-primary btn-link" onclick="app.view('profile')"><i class="material-icons">account_circle</i  >Mi Perfil</button>
                        <button type="button" class="dropdown-item btn btn-primary btn-link" onclick=""><i class="material-icons">settings</i>  Configuración</button>
                        <button type="button" class="dropdown-item btn btn-primary btn-link" onclick="app.view('logout')"><i class="material-icons">cancel</i>  Cerrar Sesión</button>
                    </div>
                </li>
            
            </ul>
            <?php } ?>  
        </div>
        </div>
    </nav>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('/RepoPaging/resources/img/bgimg.jpg'); background-size: cover; background-position: top center; background-attachment: fixed;" >
<?php
}
function scripts() {

?>
    
    <script src="/RepoPaging/resources/js/jquery.min.js"></script>
    <script src="/RepoPaging/resources/js/bootstrap.min.js"></script>
    <script src="/RepoPaging/resources/js/app.js"></script>
    <script src="https://kit.fontawesome.com/1bc5d83cc1.js" crossorigin="anonymous"></script>
    <script src="/RepoPaging/resources/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/RepoPaging/resources/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="/RepoPaging/resources/js/plugins/moment.min.js"></script>
    <script src="/RepoPaging/resources/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="/RepoPaging/resources/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="/RepoPaging/resources/js/material-kit.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        //init DateTimePickers
        materialKit.initFormExtendedDatetimepickers();

        // Sliders Init
        materialKit.initSliders();
        });
    </script>
<?php 

} 

function footer($banner = "Paging") {

?>
</div> <!-- Se cierra el div que pone el fondo a la página-->

</body>
</html>
<?php

}