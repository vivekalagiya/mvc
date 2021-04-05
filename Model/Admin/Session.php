<?php

namespace Model\Admin;

class Session extends \Model\core\Session 
{
    public function __construct()
    {
        Parent::__construct();
        $this->setNameSpace('Admin');

    }

}
