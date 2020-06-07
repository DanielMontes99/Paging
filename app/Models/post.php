<?php

namespace Models;

use Models\DB;

class post extends DB {

    public $table;

    function __construct(){
        parent::__construct();
        $this->table = $this->db_connect();
    }
    protected $campos = ['userId','isbn','titulo','spoiler','stars','review'];

    public $valores = [];
}