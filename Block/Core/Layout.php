<?php

namespace Block\Core;

class Layout extends Template 
{
    public function __construct()
    {
        $this->setTemplate('./View/core/layout/three_column.php');
        $this->prepareChildren();
    }

    public function prepareChildren()
    {
        $this->addChild($this->createBlock('Block\Core\Layout\Content'), 'content');
        $this->addChild($this->createBlock('Block\Core\Layout\Left'), 'leftBar');
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
