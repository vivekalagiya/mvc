<?php 
namespace Model\Core;

class Url  
{
    protected $request = Null;

    public function __construct()
    {
        $this->setRequest();
    }
    
    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }

    public function getRequest()    
    {
        if(!$this->request) {
            $this->request = \Mage::getModel('Model\Core\Request');
        }
        return $this->request;
    }

    public function redirect($controllerName = NULL, $actionName = NULL, $params = [], $resetParams = false) {
        if($controllerName == Null) {
            $controllerName == $_GET['c'];
        }
        if($actionName == Null) {
            $actionName == $_GET['a'];
        }
        header("Location:".$this->getUrl($controllerName, $actionName, $params, $resetParams));
        exit(0);
    }   

    public function getUrl($controllerName = Null, $actionName = Null, $params = [], $resetParams = false) {
        
        $final = $_GET;
        
        if($resetParams) {
            $final = [];
        }

        if($controllerName == Null) {
            $controllerName = $_GET['c'];
        }
        if($actionName == Null) {
            $actionName = $_GET['a'];
        }
        
        $final['c'] = $controllerName;
        $final['a'] = $actionName;
        $final = array_merge($final, $params);
        $queryString = http_build_query($final);
        unset($final);
        
        return "http://localhost/projects/mvc/?{$queryString}";
    }

    public function baseUrl($subUrl = Null)
    {
        $url = "http://localhost/projects/mvc/";
        if($subUrl) {
            $url .= $subUrl;
        }
        return $url;
    }

}



?>
