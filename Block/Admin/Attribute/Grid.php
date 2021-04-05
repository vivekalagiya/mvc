<?php

namespace Block\Admin\Attribute;


class Grid extends \Block\Core\Template   
{

    public $attribute = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Attribute/grid.php');
    }


    public function setAttribute($attribute = Null) {
        if(!$attribute) {
            $attribute = \Mage::getModel('Model\Attribute');
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
