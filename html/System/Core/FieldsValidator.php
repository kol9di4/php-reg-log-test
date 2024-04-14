<?php

namespace System\Core;

use System\Contracts\IFieldsValidator;


class FieldsValidator  implements IFieldsValidator{


    public static function loginValidation($login) : array{
        $errors = [];
        if (preg_match('/\s/', $login))
            $errors['login'] = 'Логин не должен содержать пробелы';
        else if (strlen($login) < 6)
            $errors['login'] = 'Логин не меньше 6 символов';
        else if(ctype_space($login))
            $errors['login'] = 'Логин не может состоять из одних пробелов';

        return $errors;
    }

    public static function passwordValidation($password) : array{
        $errors = [];
        if (preg_match('/\s/', $password))
            $errors['password'] = 'Пароль не должен содержать пробелы';
        else if (strlen($password) < 7)
            $errors['password'] = 'Пароль не меньше 7 символов';
        else if(!preg_match('#[0-9]+#',$password)) 
            $errors['password'] = 'Ваш пароль должен содержать хотя бы 1 цифру';
        else if(!preg_match('#[A-Z]+#',$password)) 
            $errors['password'] = 'Ваш пароль должен содержать хотя бы 1 заглавную букву';
        else if(!preg_match('#[a-z]+#',$password)) 
            $errors['password']= 'Ваш пароль должен содержать хотя бы 1 строчную букву';
        else if(!preg_match('#(!|_|@|\#|-|%)+#',$password)) 
            $errors['password']= 'Ваш пароль должен содержать хотя бы 1 символ ! _ @ # - %';

        return $errors;
    }

    public static function emailValidation($email) : array{
        $errors = [];
        if (preg_match('/\s/', $email))
            $errors['email'] = 'Email не должен содержать пробелы';
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            $errors['email']= 'Несуществующий email';

        return $errors;
    }

    public static function nameValidation($name) : array{
        $errors = [];
        if (preg_match('/\s/', $name))
            $errors['name'] = 'Имя не должно содержать пробелы';

        return $errors;
    }
    
}