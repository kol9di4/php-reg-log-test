<?php

namespace System\Core;

use System\Contracts\IStorage;

class Auth {

    protected string $token;


    /**
     * @param IStorage $usersdb
     * @param IStorage $sessionsdb
     */
    public function __construct(
        protected IStorage $userDb,
        protected IStorage $sessionsDb
    ){}

    public function getUserName() : ?string{
        $this->setToken();
        if($this->token !== ''){
            $id = $this->gethUserId();
            $name = $this->userDb->get($id)['name'];
            return $name;
        }

        return '';
    }
    
    protected function setToken(){
        $this->token  = $_SESSION['token'] ?? $_COOKIE['token'] ?? '';
    }

    protected function gethUserId() : ?int{
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
