<?php 

namespace Block\Admin\Customer\Edit\Tabs;



class Group extends \Block\Admin\Customer\Edit
{
    public $customerGroup = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/Edit/Tabs/group.php');
    }  
        
    public function setCustomerGroup($customerGroup = Null) {
        if(!$customerGroup) {
            $customerGroup = \Mage::getModel('Model\Customer\CustomerGroup');
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