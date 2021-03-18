<?php 

namespace Model\Admin;

\Mage::loadFileByClassName('Model_Admin_Session');

class Message extends Session
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function setSuccess($message)
    {
        $this->success = $message;
        return $this;
    }

    public function getSuccess()
    {
        if(!$this->success) {
            return null;
        }
        return $this->success;
    }

    public function clearSuccess()
    {
        if(!$this->success = Null) {
            return $this;
        }
        unset($this->success);
        return $this;
    }

    public function setFailure($message)
    {
        $this->failure = $message;
        return $this;
    }

    public function getFailure()
    {
        if(!$this->failure) {
            return null;
        }
        return $this->failure;
    }

    public function clearFailure()
    {
        if(!$this->failure = Null) {
            return null;
        }
        unset($this->failure);  
        return $this;
    }

}
