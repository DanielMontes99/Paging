<?php

namespace Models;

class DB {

    public $db_host;
    public $db_name;
    private $db_user;
    private $db_passwd;

    public $conn;

    public $s = " * ";
    public $w = " 1 ";
    public $j = "";
    public $o = "";
    public $l = "";

    public $i = "";
    public $v = "";

    public $r;

    function __construct($dbh = "localhost", $dbn = "pi-paging"){
        $this->db_user = "root";
        $this->db_host = $dbh;
        $this->db_name = $dbn;
    }

    public function db_connect(){
        $this->conn = new \mysqli($this->db_host, $this->db_user, "", $this->db_name);
        $this->conn->set_charset("utf8");
        if($this->conn->connect_error){
            echo "Falló la conexión a la db";
        } else {
            return $this->conn;
        }
    }

    public function select($cc=[]){
        if(count($cc) > 0){
            $this->s = implode(",",$cc);
        }
        return $this;
    }

    public function join($join="",$on=""){
        if($join != "" && $on != ""){
            $this->j = ' join ' . $join . ' on ' . $on . ' ';
        }
        return $this;
    }

    public function where($WW=[]){
        $this->w = "";
        if(count($WW) > 0){
            foreach($WW as $where){
                $this->w .= $where[0] . " like '" . $where[1] . "' " . ' and ';
            }
            $this->w .= ' 1 ';
        }
        return $this;
    }

    public function whereor($WW=[]){
        $this->w = "";
        if(count($WW) > 0){
            foreach($WW as $where){
                $this->w .= $where[0] . " like '" . $where[1] . "' " . ' or ';
            }
            $this->w = trim($this->w," or ");
        }
        return $this;
    }

    public function orderBy($ob=[]){
        $this->o = "";
        if(count($ob) > 0){
            foreach($ob as $orderBy){
                $this->o .= $orderBy[0] . ' ' . $orderBy[1] . ',';
            }
            $this->o = 'order by ' . trim($this->o,",");
        }
        return $this;
    }

    public function limit($l=""){
        $this->l = "";
        if($l != ""){
            $this->l = ' limit ' . $l;
        }
        return $this;
    }

    public function get(){
        $sql =  'select ' . $this->s . 
                ' from ' . str_replace("Models\\","",get_class($this)) . ' a ' .
                $this->j .
                ' where ' . $this->w .
                $this->o .
                $this->l ;

        $this->r = $this->table->query($sql);

        $result = [];

        while( $f = $this->r->fetch_assoc()){
            $result[] = $f;
        }

        return json_encode($result);
    }

    public function into($II = []){
        $this->i = "";
        if(count($II) > 0){
            foreach($II as $into){
                $this->i .= $into[0] . ',';
            }
            $this->i = trim($this->i,",");
        }
        return $this;
    }

    public function values($VV = []){
        $this->v = "";
        if(count($VV) > 0){
            foreach($VV as $values){
                $this->v .= ' "' . $values[0] . '" ,';
            }
            $this->v = trim($this->v,",");
        }
        return $this;
    }

    public function insert(){
        $sql =  'insert into ' . str_replace("Models\\","",get_class($this)) . ' ( ' . $this->i . ' ) ' . 'values ( ' . $this->v . ' ) ';

        $this->r = $this->table->query($sql);

        return json_encode($this->r);
    }
}