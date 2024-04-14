<?php

namespace System\Core;

use System\Contracts\IStorage;

class AutoLogin {

    public function __construct(
        protected IStorage $userDb,
        protected IStorage $sessionsDb,
        protected $token
    ){}

    public function getUserName() : ?string{
        $id = $this->gethUserId();
        $name = $this->userDb->get($id)['name'];

        return $name;
    }
    
    protected function gethUserId():?int{
        $records = $this->sessionsDb->getRecords();
        $id = null;
        foreach ($records as $record){
            if ($record['token'] === $this->token){
                $id = $record['id_user'];
            }
        }

        return $id;
    }
}
