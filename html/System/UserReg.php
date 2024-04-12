<?php

namespace System;

use System\BaseClases\User;
use System\Contracts\IFieldsValidator;

class UserReg extends User{

    protected IFieldsValidator $validator;

    public function setValidator(IFieldsValidator $validator):self{
        $this->validator = $validator;
        return $this;
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