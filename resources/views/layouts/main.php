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
    <nav class="navbar fixed-top navbar-expand-lg bg-primary" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="#" onclick="app.view('inicio')">
                    <img src="/RepoPaging/resources/img/logo_grande.png" alt="logo" class="" style="height:36px; width:120px;">
                </a>
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
                        <a class="nav-link" href="#" onclick="app.view('inicio')">
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

function footer($banner = "") {

?>
</div> <!-- Se cierra el div que pone el fondo a la página-->

</body>
</html>
<?php

}