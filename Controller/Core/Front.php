<?php

nameSpace Controller\Core;

class Front {
    public static function init() {
        if(!array_key_exists('c', $_GET)) {
            $_GET['c'] = 'Index';
        }
        if(!array_key_exists('a', $_GET)) {
            $_GET['a'] = 'index';
        }
        $className = 'Controller\\Admin\\'.ucfirst($_GET['c']);
        $actionName = $_GET['a'].'Action';
        $controller = \Mage::getController($className);
        $controller->$actionName();

    } 

    public function prepareClassName($key, $nameSpace)
    {
        $className = $nameSpace.'\\'.$key;
        $className = str_replace('\\', ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ', '\\', $className);
        return $className;
    }

}

?>