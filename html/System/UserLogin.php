<?php

namespace System;

use System\BaseClases\User;
use System\UserFieldsLoginHelper as UFLH;

class UserLogin extends User{

    protected UFLH $helper;

    public function setValidator(UFLH $helper):self{
        $this->helper = $helper;
        return $this;
    }

    public function login(){
        $errors = $this->helper->isUserExists();
        // if(empty($errors)){

        // }
        return $errors;
    }
    
}