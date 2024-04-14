<?php

namespace Models;

use System\BaseClases\User;
use System\Contracts\IStorage;

class UserLogin extends User{

    protected IStorage $usersDb;
    protected IStorage $sessionsDb;
    protected string $token;

    /**
     * @param string $login
     * @param string $password
     * @param IStorage $usersdb
     * @param IStorage $sessionsdb
     */
    function __construct($login, $password, $usersDb, $sessionsDb){
        parent::__construct($login, $password);
        $this->usersDb = $usersDb;
        $this->sessionsDb = $sessionsDb;
    }    

    public function login() : array{
        $responce = $this->isUserExists();
        
        if(isset($responce['id'])){
            $token = substr(bin2hex(random_bytes(128)),0,128);
            $this->sessionsDb->create([
                'id_user' => $responce['id'],
                'token' => $token
            ]);
            $_SESSION['token'] = $token;
            setcookie('token', $token, time()+3600*24*30);

            return [];
        }

        return $responce;
    }

    public function isUserExists() : array{
        $errors = ['message'=>'Пользователь с таким email/login не найден или вы ввели неверный пароль'];

        foreach ($this->usersDb->getRecords() as $key=>$record){
            $isUserExists = ($record['login'] === $this->login || $record['email'] === $this->login);
            if ($isUserExists && password_verify($this->password, $record['password'])){
                return ['id'=>$key];
            }
        }

        return $errors;
    }
    
}