<?php

namespace Model\Admin;

\Mage::loadFileByClassName('Model_core_Session');

class Session extends \Model\core\Session 
{
    public function __construct()
    {
        Parent::__construct();
        $this->setNameSpace('Admin');

    }

}
