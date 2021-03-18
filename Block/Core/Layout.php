<?php

namespace Block\Core;

\Mage::loadFiLeByClassName('Block_Core_Template');
\Mage::loadFiLeByClassName('Block_Core_Layout_Content');
\Mage::loadFiLeByClassName('Block_Core_Layout_Left');

class Layout extends Template 
{
    public function __construct()
    {
        $this->setTemplate('./View/core/layout/three_column.php');
        $this->prepareChildren();
    }

    public function prepareChildren()
    {
        $this->addChild($this->createBlock('Block_Core_Layout_Content'), 'content');
        $this->addChild($this->createBlock('Block_Core_Layout_Left'), 'leftBar');
    }

    public function getContent()
    {
        return $this->getChild('content');
    }

    public function getLeftBar()
    {
        return $this->getChild('leftBar');
    }

    public function getRightBar()
    {
        return $this->getChild('rightBar');
    }

}
