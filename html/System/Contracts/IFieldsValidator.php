<?php

namespace System\Contracts;

interface IFieldsValidator{
    
    public static function loginValidation($login) : array;
    public static function passwordValidation($password) : array;
    public static function emailValidation($email) : array;
    public static function nameValidation($name) : array;

}