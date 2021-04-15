<?php

spl_autoload_register(__NAMESPACE__ .'\Mage::loadFileByClassName'); 

class Mage {

    public static function loadFileByClassName($className)
    {
        $className = str_replace('\\',  ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ',  '\\', $className);
        $className = $className.'.php';
        require_once $className;
        
    }
    
    public static function init() {
        \Controller\Core\Front::init();
    }
    
    public function getController($className)
    {
        $className = str_replace('\\',  ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ',  '\\', $className);
        
        return new $className;

    }

    public function getModel($className)
    {
        $className = str_replace('\\',  ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ',  '\\', $className);
        
        return new $className;

    }

    public function getBlock($className)
    {
        $className = str_replace('\\',  ' ', $className);
        $className = ucwords($className);
        $className = str_replace(' ',  '\\', $className);
        
        return new $className;

    }

    public function getBaseDir($subPath = Null)
    {
        if($subPath) {
            return getcwd().DIRECTORY_SEPARATOR.$subPath;
        }
        return getcwd();
    }
}
Mage::init();


?>