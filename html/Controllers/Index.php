<?php

namespace Controllers;

use System\Core\Template;
use System\Contracts\IController;

class Index implements IController{

    protected string $title = 'Index Page';
    public function __construct(
        protected string $header
    ){}

    public function render(): string{
        return Template::template('Views/Base/v_main', [
            'title'=>$this->title,
            'header'=>$this->header,
        ]);
    }

}