<?php

namespace Controllers;

use Models\libro;

class LibrosController {
    public function __construct(){

    }

    public function getLibros(){
        $libros = new libro();

        $result = $libros->get();

        return $result;
    }

}