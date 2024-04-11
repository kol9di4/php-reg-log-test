<?php

namespace System;

use System\BaseClases\User;

class RegUser extends User{

    public function userLoginCheck():bool{
        return true;
    }
    public function userRegister():array{
        return [];
    }

}