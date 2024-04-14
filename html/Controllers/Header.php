<?php

namespace Controllers;

use System\Core\Auth;
use System\Core\Template;
use System\Contracts\IController;

class Header implements IController{

    protected string $userName;

    public function __construct(
        protected Auth $auth
    ){}

    public function render(): string{
        $this->setUserName();
        if ($this->userName === '')
            return Template::template('Views/Header/v_index');
        else
            return Template::template('Views/Header/v_login',['userName'=>$this->userName]);
    }

    protected function setUserName(){
        $this->userName = $this->auth->getUserName();
        if($this->userName === null){
            unset($_SESSION['token']);
            setcookie('token','',-2,'index.php');
        }
    }

}