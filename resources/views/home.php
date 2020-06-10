<?php

namespace views;

require "../../app/autoload.php";

include 'layouts/main.php';

use Controllers\auth\LoginController as LoginController;

$ua = new LoginController;

head($ua);

?>
    
<div class="container pt-5">
    
    <div class="section">
        <div class="row">
            <div class="col">
        
            </div>
            <div class="col-8" >
           
                <div class="container ">
                <?php if(!is_null($ua) && $ua->sv){ ?>
                    <div class="card">
                        <div class="card-body">
                            <form class="form" id="postform" method="POST" action="">
                            
                                <div class="form-group">
                                    <label for="libro" class="bmd-label-floating">Título del libro</label>
                                    <select id="libro" name="libro" class="form-control">
                                        
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="stars" class="bmd-label-floating">Calificación</label>
                                    <select id="stars" name="stars" class="form-control">
                                        <option value="" selected disabled hidden>Selecciona la calificación</option>
                                        <option value="1">1 Estrella</option>
                                        <option value="2">2 Estrellas</option>
                                        <option value="3">3 Estrellas</option>
                                        <option value="4">4 Estrellas</option>
                                        <option value="5">5 Estrellas</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="review" class="bmd-label-floating">Escribe tu reseña</label>
                                    <textarea type="text" class="form-control" rows="2" id="review"></textarea>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="togglebutton">
                                        <label>
                                            <input id="spoiler" name="spoiler" value="1" type="checkbox">
                                            <span class="toggle"></span>
                                            Spoiler
                                        </label>
                                    </div>
                                    <div class="col-md-4 ml-auto mr-2 text-center">
                                        <button class="btn btn-primary btn-round" onclick="app.view('inicio')" type="submit">
                                            Publicar
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                <?php } ?>
                <br>

                </div>

                <div id="previous-posts">
                    <!-- Se llena con javascript, posts generales -->
                </div>
                
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</div>

<?php scripts(); ?>
<script src="/RepoPaging/resources/js/app_home.js"></script>
<script src="/RepoPaging/resources/js/app_likes.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        app_home.previousPosts();
        app_home.getLibros();
        
        const publicacion = $("#postform");

        publicacion.submit(function(e){
            e.preventDefault();
            e.stopPropagation();
    
            const datos = new FormData();
            datos.append("userId", <?=$ua->id?>);
            datos.append("isbn", $("#libro").val());
            datos.append("stars", $("#stars").val());
            datos.append("review", $("#review").val());
            /*if($('spoiler').is(":checked")) {
                datos.append("spoiler", 1);
            } else {
                datos.append("spoiler", 0);
            }*/
            datos.append("spoiler",$('input:checkbox[name=spoiler]:checked').val());
            datos.append("post", '');
            console.table(datos);
            fetch(app.routes.post,{
                method : 'POST',
                body : datos
            })
            .then( response => response.json())
            .then( resp => {
                console.log("Post : ", resp.r);

            }).catch( error => console.log("Error -> " + error));
        });
    });
</script>

<?php footer(); ?>