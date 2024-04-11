<?php

namespace System;

use IField;
use System\BaseClases\User;
use System\Contracts\IFieldsValidator;

class UserReg extends User{

    protected IFieldsValidator $validator;

    public function setValidator(IFieldsValidator $validator){
        $this->validator = $validator;
    }

    public function userRegister():array{
        $errors =$this->validator->isValid();
        if(empty($errors)){
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
            return [];
        }
        
        return $errors;
    }

}