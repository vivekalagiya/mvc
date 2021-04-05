<?php

namespace Block\Admin\Attribute;


class Edit extends \Block\Core\Template   
{

    public $attribute = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Attribute/edit.php');
    }

    public function setAttribute($attribute = Null) {
        if(!$attribute) {
            $id = $this->getRequest()->getGet('id');
            $attribute = \Mage::getModel('Model\Attribute');
            $attribute = $attribute->load($id);
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
