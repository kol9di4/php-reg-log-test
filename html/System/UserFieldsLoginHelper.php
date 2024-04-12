<?php

namespace System;

use System\UserFieldsValidator;


class UserFieldsLoginHelper extends UserFieldsValidator{

    public function isUserExists(){
        $errors = ['message'=>'Пользователь с таким email/login не найден или вы ввели неверный пароль'];
        foreach ($this->db->getRecords() as $record){
            $isUserExists = ($record['login'] === $this->login || $record['email'] === $this->login);
            if($isUserExists) $errors['login'] = 'true';
            if ($isUserExists && password_verify($this->password, $record['password'])){
                return [];
            }
        }
        return $errors;
    }

}