<?php 

namespace System\Core;

class Template{

    public static function template(string $path, array $vars = []) : string{
        $systemTemplateRenererIntoFullPath = "$path.php"; 
        extract($vars);
        ob_start();
        include($systemTemplateRenererIntoFullPath);
        return ob_get_clean();
    }

}