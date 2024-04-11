<?php

namespace System\BaseClases;

class User{

    public function __construct(
        protected string $login,
        protected string $password,
        protected string $email,
        protected string $name
    )
    {}
    public function collectInfo():array
    {
        return [
            'login' => $this->login,
            'password' => $this->password,
            'email' => $this->email,
            'name' => $this->name
        ];
    }
}