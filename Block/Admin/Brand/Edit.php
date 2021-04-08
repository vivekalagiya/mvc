<?php

namespace Block\Admin\Brand;


class Edit extends \Block\Core\Template  
{

    public $brand = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Brand/edit.php');
    }

    public function setBrand($brand = Null) {
        if(!$brand) {
            $id = $this->getRequest()->getGet('id');
            $brand = \Mage::getModel('Model\Brand');
            $brand = $brand->load($id);
        }
        $this->brand = $brand;
        return $this;
    }

    public function getBrand() {
        if(!$this->brand) {
            $this->setBrand();
        }
        return $this->brand;
    }

}
