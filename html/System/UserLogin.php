<?php

namespace System;

use System\BaseClases\User;
use System\Contracts\IStorage;

class UserLogin extends User{

    protected IStorage $db;

    public function setDb(IStorage $fs):self{
        $this->db = $fs;
        return $this;
    }

    public function isUserExists(){

    }

}