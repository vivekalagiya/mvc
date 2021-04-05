<?php 

namespace Block\Admin\Customer\CustomerGroup;



class Grid extends \Block\Core\Template
{
    public $customerGroups = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/CustomerGroup/grid.php');
    }  
        
    public function setCustomerGroups($customerGroups = Null) {
        if(!$customerGroups) {
            $customerGroups = \Mage::getModel('Model\Customer\CustomerGroup');
            $customerGroups = $customerGroups->fetchAll();
        }
        $this->customerGroups = $customerGroups;
        return $this;
    }

    public function getCustomerGroups() {
        if(!$this->customerGroups) {
            $this->setCustomerGroups();
        }
        return $this->customerGroups;

    }
}




?>