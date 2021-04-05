<?php

namespace \Block\Admin;


class Layout extends \Block\Core\Layout 
{
    public function __construct()
    {
        parent::construct();
        $this->setTemplate('View/Admin/layout.php');
    }
}







?>