<?php

namespace Block\Core;


class Template 
{
    protected $children = [];
    protected $controller = Null;
    protected $template = Null;
    protected $url = Null;
    protected $tabs = [];
    protected $request = Null;

 
    
    public function setChildren(array $children = [])
    {
        $this->children = $children;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function addChild($child, $key = Null)
    {
        if(!$key) {
            $key = get_class($child);
        }
        $this->children[$key] = $child;
        return $this;
    }

    public function getChild($key)
    {
        if(!array_key_exists($key, $this->children)) {
            return Null;
        }
        return $this->children[$key];
    }

    public function removeChild($key)
    {
        if(array_key_exists($key, $this->children)) {
            unset($this->children[$key]);
        }
        return $this;
    }


    public function toHtml() {
        ob_start();
        require_once $this->template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function setController($controller = null)
    {
        $this->controller = $controller;
        return $this;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setRequest($request = null)
    {
        if(!$request) {
            $request = \Mage::getModel('Model\Core\Request');
        }
        $this->request = $request;
        return $this;
    }

    public function getRequest()
    {
        if(!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }

    public function setTemplate($template = null)
    {
        $this->template = $template;
        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function getMessage()
    {
        return \Mage::getModel('Model\Admin\Message');
    }

    public function setUrl($url = null)
    {
        if(!$url) {
            $url = \Mage::getModel('Model\Core\Url');
        }
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        if(!$this->url){
            $this->setUrl();
        }
        return $this->url;
    }

    public function setTabs(array $tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function addTab($key, $tab = [])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }

    // public function getTab($key)
    // {
    //     if(!array_key_exists($key, $this->tabs)) {
    //         return Null;
    //     }
    //     return $this->tabs[$key];
    // }

    public function removeTab($key)
    {
        if(!array_key_exists($key, $this->tabs)) {
            return Null;
        }
        unset($this->tabs[$key]);
    }

    public function createBlock($className)
    {
        return \Mage::getBlock($className);
    }

}
