<?php

namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block_Core_Template');


class Grid extends \Block\Core\Template 
{

    public $customers = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/grid.php');
    }

    public function setCustomers($customers = Null) {
        if(!$customers) {
            $customer = \Mage::getModel('Model_Customer');
            $customers = $customer->fetchAll();
        }
        $this->customers = $customers;
        return $this;
    }

    public function getCustomers() {
        if(!$this->customers) {
            $this->setCustomers();
        }
        return $this->customers;
    }

}
