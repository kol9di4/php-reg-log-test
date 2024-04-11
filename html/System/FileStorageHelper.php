<?php

namespace System;

use System\FileStorage;

class FileStorageHelper extends FileStorage{

    public function checkUniqField($field, $value):bool{
        foreach (self::$records as $record){
            if($record[$field] === $value)
                return false;
        }

        return true;
    }

}