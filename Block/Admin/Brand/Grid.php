<?php

namespace Block\Admin\Brand;


class Grid extends \Block\Core\Template  
{

    protected $brands = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Brand/grid.php');
    }


    public function setBrands($brands = Null) {
        if(!$brands) {
            $brands = \Mage::getModel('Model\Brand');
            $brands = $brands->fetchAll();
        }
        $this->brands = $brands;
        return $this;
    }

    public function getBrands() {
        if(!$this->brands) {
            $this->setBrands();
        }
        return $this->brands;
    }
}
