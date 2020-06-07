<?php

namespace Controllers\auth;

use Models\user;

class LoginController {

    public $sv;
    public $user_Alias;
    public $id;
    public function __construct(){
        $this->sv = false;
    }

    public function userRegister($datos){
        $user = new user;
        $result = $user->whereor([['user_Email',$datos['user_Email']],['user_Alias',$datos['user_Alias']]])->get();
        if(sizeof(json_decode($result)) > 0){
            echo json_encode(["r"=>false]);
        }else{
            $result1 = $user->into([['user_Email'],['user_Alias'],['user_Pass']])->values([[$datos['user_Email']],[$datos['user_Alias']],[$datos['user_Pass']]])->insert();
            return $this->sessionRegister($datos);
        }
    }

    public function userAuth($datos){
        $user = new user;
        $result = $user->where([['user_Email',$datos['user_Email']],['user_Pass',$datos['user_Pass']]])->get();
        if(sizeof(json_decode($result)) > 0){
            return $this->sessionRegister($datos);
        }else{
            $this->sessionDestroy();
            echo json_encode(["r"=>false]);
        }
    }

    function sessionRegister($datos){
        session_start();
        $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['user_Email'] = $datos['user_Email'];
        $_SESSION['user_Pass'] = $datos['user_Pass'];

        session_write_close();
        return json_encode(["r"=>true]);
    }

    public function sessionValidate() {
        $user = new user;
        session_start();
        if( session_status() == PHP_SESSION_ACTIVE && count($_SESSION) > 0) {
            $datos = $_SESSION;
            $result = $user->where([['user_Email',$datos['user_Email']],['user_Pass',$datos['user_Pass']]])->get();
            if(sizeof(json_decode($result)) > 0 && $datos['IP'] == $_SERVER['REMOTE_ADDR']) {
                session_write_close();
                $this->sv = true;
                $this->user_Alias = json_decode($result)[0]->user_Alias;
                $this->id = json_decode($result)[0]->id;
                return $result;
            }
            session_write_close();
            $this->sessionDestroy();
            return null;
        }
    }

    public function userLogout(){
        $this->sessionDestroy();
        return;
    }

    function sessionDestroy() {
        session_start();
        $_SESSION = [];
        session_destroy();
        session_write_close();
        $this->sv = false;
        $this->user_Alias = "";
        $this->id = "";
        return;
    }

}