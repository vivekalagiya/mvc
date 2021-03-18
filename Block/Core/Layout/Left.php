<?php

namespace Block\Core\Layout;

\Mage::loadFileByClassName('Block_Core_Template');

class Left extends \Block\Core\Template
{

    public function __construct()
    {
        $this->setTemplate('./View/core/layout/left.php');
    }

    

}
