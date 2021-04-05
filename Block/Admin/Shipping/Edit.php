<?php

namespace Block\Admin\Shipping;




class Edit extends \Block\Core\Template 
{

    public $shipping = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Shipping/edit.php');
    }

    public function setShipping($shipping = Null) {
        if(!$shipping) {
            $shipping = \Mage::getModel('Model\Shipping');
            if($id = $shipping->getGet('id')) {
                $shipping->load($id);
            }
        }
        $this->shipping = $shipping;
        return $this;
    }

    public function getShipping() {
        if(!$this->shipping) {
            $this->setShipping();
        }
        return $this->shipping;
    }

}
