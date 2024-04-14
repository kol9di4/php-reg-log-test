<?php

namespace System;

use System\Contracts\IStorage;

class AutoLogin {

    public function __construct(
        protected IStorage $userDb,
        protected IStorage $sessionsDb,
        protected $token
    ){}

    protected function gethUserId():?int{
        $records = $this->sessionsDb->getRecords();
        $id = null;
        foreach ($records as $key=>$record){
            if ($record['token'] === $this->token){
                $id = $record['id_user'];
            }
        }

        return $id;
    }

    public function gethUserName() : ?string{
        $id = $this->gethUserId();
        $name = $this->userDb->get($id)['name'];

        return $name;
    }

}