<?php

namespace System\BaseClases;

abstract class User{

    public function __construct(
        protected string $login,
        protected string $password
    ){}

}