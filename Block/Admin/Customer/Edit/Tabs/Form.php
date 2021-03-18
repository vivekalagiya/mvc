<?php 

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class Form extends \Block\Core\Template
{
    public $customer = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/Edit/Tabs/form.php');
    }  
        
    public function setCustomer($customer = Null) {
        if(!$customer) {
            $customer = \Mage::getModel('Model_Customer');
            $customer_id = (int) $this->getRequest()->getGet('id');
            if($customer_id){
                $customer = $customer->load($customer_id);
            }
        }
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer() {
        if(!$this->customer) {
            $this->setCustomer();
        }
        return $this->customer;

    }
}




?>