<?php

namespace app;

require_once "autoload.php";

use Controllers\auth\LoginController as LoginController;
use Controllers\PostsController as PostsController;

$login = in_array('login', array_keys($_POST));

if($login){
    $datos = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $userLogin = new LoginController();
    print_r($userLogin->userAuth($datos));
}

$register = in_array('register', array_keys($_POST));

if($register){
    $datos = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $userRegister = new LoginController();
    print_r($userRegister->userRegister($datos));
}

$logout = in_array('logout', array_keys($_GET));

if($logout) {
    $userLogout = new LoginController();
    $userLogout->userLogout();

    header('Location: /PI/resources/views/home.php');
}

$pp = in_array('pp', array_keys($_GET));

if($pp) {
    $pposts = new PostsController();
    print_r($pposts->getPosts());
}

//* CARGAR PUBLICACIONES
$mp = in_array('mp', array_keys($_GET));

if($mp) {
    $id = filter_input(INPUT_GET,'id');
    $mposts = new PostsController();

    print_r($mposts->myPosts($id));
}