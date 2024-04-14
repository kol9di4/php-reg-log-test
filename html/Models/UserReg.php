<?php

namespace Models;

use System\BaseClases\User;
use System\Core\FieldsValidator as FV;
use System\Core\FileStorage;

class UserReg extends User{
    
    protected string $email;
    protected string $name;
    protected FileStorage $db;

    function __construct($login, $password, $email, $name, $db){
       parent::__construct($login, $password);
       $this->email = $email;
       $this->name = $name;
       $this->db = $db;
   }

    public function userRegister():array{
        $errors = $this->checkAllFields();     

        if(empty($errors)){
            $this->password = password_hash($this->password,PASSWORD_BCRYPT);
            return [];
        }

        return $errors;
    }

    public function collectInfo():array
    {
        return [
            'login' => $this->login,
            'password' => $this->password,
            'email' => $this->email,
            'name' => $this->name
        ];
    }

    protected function checkAllFields(){
        $errors = [];
        $errors = array_merge(FV::loginValidation($this->login), $errors);
        $errors = array_merge(FV::passwordValidation($this->password), $errors);
        $errors = array_merge(FV::emailValidation($this->email), $errors);
        $errors = array_merge(FV::nameValidation($this->name), $errors);
        $errors = array_merge($this->checkUniqField(), $errors);

        return $errors;
    }

    protected function checkUniqField(){
        $errors = [];
        foreach ($this->db->getRecords() as $record){
            if($record['email'] === $this->email){
                $errors['email'] = 'Такой email уже существует!';
            }
            if($record['login'] === $this->login){
                $errors['login'] = 'Такой логин уже существует!';
            }
        }
        return $errors;
    }



}