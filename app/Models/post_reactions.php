<?php

namespace Models;

use Models\DB;

class post_reactions extends DB {

    public $table;

    function __construct(){
        parent::__construct();
        $this->table = $this->db_connect();
    }
    protected $campos = ['post_id','user_id'];

    public $valores = [];
}