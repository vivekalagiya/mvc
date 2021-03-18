<?php

namespace Block\Admin\Shipping;

\Mage::loadFileByClassName('Block_Core_Template');


class Grid extends \Block\Core\Template 
{

    public $shippings = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Shipping/grid.php');
    }


    public function setShippings($shippings = Null) {
        if(!$shippings) {
            $shipping = \Mage::getModel('Model_Shipping');
            $shippings = $shipping->fetchAll();
        }
        $this->shippings = $shippings;
        return $this;
    }

    public function getShippings() {
        if(!$this->shippings) {
            $this->setShippings();
        }
        return $this->shippings;

    }
}
