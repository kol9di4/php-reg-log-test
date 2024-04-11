<?php

namespace System;

use System\BaseClases\User;
use System\FileStorage;

class UserReg extends User{
    protected $errors = [];
    private FileStorage $db;

    public function setDb(FileStorage $fs){
        $this->db = $fs;
    }

    public function userLoginCheck():bool{
        return true;
    }

    public function userRegister():array{
        $this->checkUniqField();
        return $this->errors;
    }

	protected function checkUniqField(){
        foreach ($this->db->getRecords() as $record){
            if($record['email'] === $this->email)
                $this->errors['email'] = 'Такой email уже существует!';
            if($record['login'] === $this->login){
                $this->errors['login'] = 'Такой login уже существует!';
            }
        }
    }

    

}