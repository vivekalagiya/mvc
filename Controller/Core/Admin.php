<?php

namespace Controller\Core;

\Mage::loadFileByClassName('Model_Core_Request');
// \Mage::loadFileByClassName('Block_Core_Layout');

class Admin {

    protected $request = Null;
    protected $layout = Null;
    protected $message = Null;

    public function __construct()
    {
    }

    public function setLayout(\Block\Core\Layout $layout = Null)
    {
        if(!$layout) {
            $layout = \Mage::getBlock('Block_Core_Layout');
        }
        $this->layout = $layout;
        return $this;       
    }

    public function getLayout()
    {
        if(!$this->layout) {
            $this->setLayout();
        }
        return $this->layout;
    }

    public function renderLayout()
    {
        echo $this->getLayout()->toHtml();
    }

    public function setRequest()
    {
        $this->request = \Mage::getModel('Model_Core_Request');
        return $this;
    }

    public function getRequest()    
    {
        if(!$this->request) {
            $this->request = \Mage::getModel('Model_Core_Request');
        }
        return $this->request;
    }

    public function setMessage()
    {
        $this->message = \Mage::getModel('Model_Admin_Message');
        return $this;
    }

    public function getMessage()    
    {
        if(!$this->message) {
            $this->setMessage();
        }
        return $this->message;
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
        
        
        if($controllerName == Null) {
            $controllerName = $_GET['c'];
        }
        if($actionName == Null) {
            $actionName = $_GET['a'];
        }  
        if($resetParams) {
            $params = [];
        } 
                                                        
        $final['c'] = $controllerName;
        $final['a'] = $actionName;
        $final = array_merge($final, $params);
        $queryString = http_build_query($final);
        unset($final);
        
        return "http://localhost/projects/mvc/?{$queryString}";


    }

}


?>