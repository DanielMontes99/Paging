<?php

namespace views;

require "../../app/autoload.php";

include 'layouts/main.php';

use Controllers\auth\LoginController as LoginController;

head(new LoginController);

?>

    

<div class="container">
    <div class="section" style="margin-top: 30em;">
        <div class="row">
            <div class="container col-6 ml-auto mr-auto">
                <div class="card">
                    <div class="card-body">
                        <form class="contact-form">
                            <div class="form-group">
                                <label for="exampleMessage" class="bmd-label-floating">Escribe tu reseña</label>
                                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                <button class="btn btn-primary btn-raised">
                                    Publicar
                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="row">
            <div class="col">

            </div>
            <div class="container col-6" id="previous-posts">
                <!-- Se llena con javascript, posts generales -->
            </div>
            <div class="col">

            </div>
        </div>
    </div>
</div>

<?php scripts(); ?>
<script src="/RepoPaging/resources/js/app_home.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        app_home.previousPosts();
    });
</script>

<?php footer(); ?>