<?php

namespace \Block\Admin;

\Mage::loadFileByClassName('Block_Core_Layout');

class Layout extends \Block\Core\Layout 
{
    public function __construct()
    {
        parent::construct();
        $this->setTemplate('View/Admin/layout.php');
    }
}







?>