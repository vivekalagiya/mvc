<?php

namespace Model\Core;

class Session  
{

    protected $nameSpace = 'Admin';

    public function __construct()
    {
        $this->start();
    }

    public function setNameSpace($nameSpace)
    {
        $this->namespace = $nameSpace;
        return $this;
    }

    public function getNameSpace()
    {
        return $this->namespace;
    }

    public function start()
    {
        if(!session_id()) {
            session_start();
            return $this;
        }
    }

    public function destroy()
    {
        session_destroy();
        return $this;
    }

    public function getId()
    {
        return session_id();
    }

    public function regenerateId()
    {
        return session_regenerate_id();
    }


    public function __set($key, $value)
    {
        $_SESSION[$this->nameSpace][$key] = $value;
        return $this;
    }

    public function __get($key)
    {
        if(!array_key_exists($key, $_SESSION[$this->nameSpace])) {
            return Null;
        }
        return $_SESSION[$this->nameSpace][$key];
    }

    public function __unset($key = Null)
    {
        if(!$key) {     
            session_unset();
            return $this;
        }
        unset($_SESSION[$this->nameSpace][$key]);
        return $this;
    }

}
