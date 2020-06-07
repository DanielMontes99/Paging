<?php

    include '../layouts/main.php';

    head(); 

?>

<!--<div class="container">
    <div class="row">
        <div class="card mt-5 w-50 col-6 col-md-4">
            <div class="card-body">
                <form action="" id="registerform">
                    <h3> <i class="fas fa-user"></i> Registrarse</h3>
                    <div class="grupo">
                        <input type="email" name="email" id="email" class="datos" required><span class="barra"></span>
                        <label for="email">Correo Electrónico</label>
                    </div>
                    <div class="grupo">
                        <input type="text" name="username" id="username" class="datos" required><span class="barra"></span>
                        <label for="username">Nombre de usuario</label>                  
                    </div>
                    <div class="grupo">
                        <input type="password" name="passwd" id="passwd" class="datos" required><span class="barra"></span>
                        <label for="passwd">Contraseña</label>             
                    </div>
                    <div class="grupo">
                        <input type="password" name="passwd1" id="passwd1" class="datos" required><span class="barra"></span>
                        <label for="passwd1">Repetir contraseña</label>   
                    </div>
                    <small id="error" class="form-text text-danger d-none mb-2">Las constraseñas no coinciden.</small>
                    <small id="error1" class="form-text text-danger d-none mb-2">El correo o nombre de usuario que ingresaste ya exite.</small>
                    
                    <button class="boton" type="submit">Registrarse</button>
                    <p class="text-right">¿Yo tienes una cuenta? <a href="login.php">Inicia Sesión</a></p>
                    
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <a href="/RepoPaging/index.php"><img class="avatar" src="/RepoPaging/resources/img/logo_grande.png" alt="logo de pagging"></a>
        </div>
    </div>
</div>-->
<div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login card-register">
            <form class="form" id="registerform" method="" action="">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Login</h4>
              </div>
              <p class="description text-center">¿Ya tienes una cuenta? <a href="login.php">¡Inicia Sesión!</a></p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-envelope"></i>
                    </span>
                  </div>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico..." required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-user"></i>
                    </span>
                  </div>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Nombre de usuario..." required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Contraseña..." required>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-lock"></i>
                    </span>
                  </div>
                  <input type="password" name="passwd1" id="passwd1" class="form-control" placeholder="Repetir Contraseña..." required>
                </div>
              </div>
              <p id="error" class="description text-center text-danger d-none mb-2">Las contraseñas no coinciden.</p>
              <p id="error1" class="description text-center text-danger d-none mb-2">El correo o nombre de usuario que ingresaste ya exite.</p>
              <div class="footer text-center">
                <button class="btn btn-primary btn-round" type="submit">Iniciar Sesión</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<?php scripts(); ?>

<script type="text/javascript">

    $(document).ready(function(){
        const logform = $("#registerform");
        //logform.on("submit", function(e){
        logform.submit(function(e){
            e.preventDefault();
            e.stopPropagation();
            
            const datos = new FormData();
            datos.append("user_Email", $("#email").val());
            datos.append("user_Alias", $("#username").val());
            datos.append("user_Pass", $("#passwd").val());
            datos.append("register", '');
            if($("#passwd").val() == $("#passwd1").val()){
                
                fetch(app.routes.logi,{
                        method : 'POST',
                        body : datos
                })
                .then( response => response.json())
                .then( resp => {
                    console.log("Resultado response login : ", resp.r);
                    if(resp.r !== false){
                        location.href = "../home.php";
                    }else{
                        $("#error1").removeClass("d-none");
                    }
                }).catch( error => console.log("Error -> " + error));

            } else {
                $("#error").removeClass("d-none");
            }
        });
    });
</script>

<?php footer(); ?>