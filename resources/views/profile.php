<?php

namespace views;

require "../../app/autoload.php";

include 'layouts/main.php';

use Controllers\auth\LoginController as LoginController;

$ua = new LoginController;

is_null($ua->sessionValidate()) ? header("Location: /RepoPaging/resources/views/auth/login.php") : '';

head($ua);

?>
<br>
<div class="container">
    <div class="section pt-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mis publicaciones</h4>    
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="my-posts">
                        <!-- Se llena con javascript -->
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </div>
</div>

<?php scripts(); ?>
<script src="/RepoPaging/resources/js/app_myposts.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        app_myposts.getMyPosts(<?=$ua->id?>);
    });
</script>

<?php footer(); ?>