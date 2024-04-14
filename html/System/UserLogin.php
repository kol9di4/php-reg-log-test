<?php

namespace System;

use System\BaseClases\User;
use System\Contracts\IStorage;
use System\UserFieldsLoginHelper as UFLH;

class UserLogin extends User{

    protected UFLH $helper;
    protected IStorage $sessionsDb;
    protected $token;

    public function setDb(IStorage $fs):self{
        $this->sessionsDb = $fs;
        return $this;
    }

    public function setValidator(UFLH $helper):self{
        $this->helper = $helper;
        return $this;
    }

    public function login(){
        $responce = $this->helper->isUserExists();
        if(isset($responce['id'])){
            $tocken = substr(bin2hex(random_bytes(128)),0,128);
            $this->sessionsDb->create([
                'id_user' => $responce['id'],
                'token' => $tocken
            ]);
            $_SESSION['token'] = $tocken;
            setcookie('token',$tocken,time()+3600*24*30);
            return [];
        }
        return $responce;
    }
    
}