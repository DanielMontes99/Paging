<?php

namespace Models;

use Models\DB;

class libro extends DB {

    public $table;

    function __construct(){
        parent::__construct();
        $this->table = $this->db_connect();
    }
    protected $campos = ['ISBN','titulo','autor','genero'];

    public $valores = [];
}