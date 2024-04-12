<?php

namespace System;

use System\Contracts\IFieldsValidator;
use System\Contracts\IStorage;
use System\BaseClases\User;


class UserFieldsValidator extends User implements IFieldsValidator{

    protected $errors = [];
    protected IStorage $db;

    public function setDb(IStorage $fs):self{
        $this->db = $fs;
        return $this;
    }

    public function isValid(): array{
        $this->loginValidation();
        $this->passwordValidation();
        $this->emailValidation();
        $this->nameValidation();
        $this->checkUniqField();

        return $this->errors;
    }

    protected function loginValidation(){
        if (preg_match('/\s/', $this->login))
            $this->errors['login'] = 'Логин не должен содержать пробелы';
        else if (strlen($this->login) < 6)
            $this->errors['login'] = 'Логин не меньше 6 символов';
        else if(ctype_space($this->login))
            $this->errors['login'] = 'Логин не может состоять из одних пробелов';
    }

    protected function passwordValidation(){
        if (preg_match('/\s/', $this->login))
            $this->errors['password'] = 'Пароль не должен содержать пробелы';
        else if (strlen($this->password) < 7)
            $this->errors['password'] = 'Пароль не меньше 7 символов';
        else if(!preg_match('#[0-9]+#',$this->password)) 
            $this->errors['password'] = 'Ваш пароль должен содержать хотя бы 1 цифру';
        else if(!preg_match('#[A-Z]+#',$this->password)) 
            $this->errors['password'] = 'Ваш пароль должен содержать хотя бы 1 заглавную букву';
        else if(!preg_match('#[a-z]+#',$this->password)) 
            $this->errors['password']= 'Ваш пароль должен содержать хотя бы 1 строчную букву';
        else if(!preg_match('#(!|_|@|\#|-|%)+#',$this->password)) 
            $this->errors['password']= 'Ваш пароль должен содержать хотя бы 1 символ ! _ @ # - %';
    }

    protected function emailValidation(){
        if (preg_match('/\s/', $this->email))
            $this->errors['email'] = 'Email не должен содержать пробелы';
        else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
            $this->errors['email']= 'Несуществующий email';
    }

    protected function nameValidation(){
        if (preg_match('/\s/', $this->name))
            $this->errors['name'] = 'Имя не должно содержать пробелы';
    }

    protected function checkUniqField(){
        foreach ($this->db->getRecords() as $record){
            if($record['email'] === $this->email)
                $this->errors['email'] = 'Такой email уже существует!';
            if($record['login'] === $this->login){
                $this->errors['login'] = 'Такой логин уже существует!';
            }
        }
    }

}