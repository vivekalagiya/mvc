<?php

namespace Controller\Admin\Customer;

class CustomerAddresses extends \Controller\Core\Admin{
    
    public function saveAction() {
        
        try {
            if(!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            
            $customer_id = $this->getRequest()->getGet('id');
            $customerAddresses = \Mage::getModel('Model\Customer\CustomerAddresses');
            if(!$customer_id) {
                throw new \Exception("Invalid Id.");
            }
            $shipping = $this->getRequest()->getPost('shipping');
            $billing = $this->getRequest()->getPost('billing');
            
            
            $query = "SELECT * FROM `customerAddresses` WHERE `customer_id` = $customer_id AND `addressType` = 'shipping' ";
            if($address = $customerAddresses->fetchRow($query)) {
                $customerAddresses->address_id = $address->address_id;
            }
            
            $customerAddresses->setData($shipping);
            $customerAddresses->addressType = 'shipping';
            $customerAddresses->customer_id = $customer_id;
            $customerAddresses->save();
            $customerAddresses->unsetData();
            
            $query = "SELECT * FROM `customerAddresses` WHERE `customer_id` = $customer_id AND `addressType` = 'billing' ";
            if($address = $customerAddresses->fetchRow($query)) {
                $customerAddresses->address_id = $address->address_id;
            }


            $customerAddresses->setData($billing);
            $customerAddresses->addressType = 'billing';
            $customerAddresses->customer_id = $customer_id;
            $customerAddresses->save();
            
            $this->redirect('Customer','edit');
        }
        catch(\Exception $e) {
            // echo $e->getMessage();
            $customerAddresses = \Mage::getModel('Model\Admin\Message');
            $customerAddresses->start();
            $customerAddresses->setFailure($e->getMessage());
        }
    }
    
    
}







?>