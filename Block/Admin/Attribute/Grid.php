<?php

namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block_Core_Template');


class Grid extends \Block\Core\Template   
{

    public $attribute = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Attribute/grid.php');
    }


    public function setAttribute($attribute = Null) {
        if(!$attribute) {
            $attribute = \Mage::getModel('Model_Attribute');
            $attribute = $attribute->fetchAll();
        }
        $this->attribute = $attribute;
        return $this;
    }

    public function getAttribute() {
        if(!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }
}
