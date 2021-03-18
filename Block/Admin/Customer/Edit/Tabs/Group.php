<?php 

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class Group extends \Block\Core\Template
{
    public $customerGroup = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/Edit/Tabs/group.php');
    }  
        
    public function setCustomerGroup($customerGroup = Null) {
        if(!$customerGroup) {
            $customerGroup = \Mage::getModel('Model_Customer_CustomerGroup');
            $customerGroup_id = (int) $this->getRequest()->getGet('id');
            if($customerGroup_id){
                $customerGroup = $customerGroup->load($customerGroup_id);
            }
        }
        $this->customerGroup = $customerGroup;
        return $this;
    }

    public function getCustomerGroup() {
        if(!$this->customerGroup) {
            $this->setCustomerGroup();
        }
        return $this->customerGroup;

    }
}




?>