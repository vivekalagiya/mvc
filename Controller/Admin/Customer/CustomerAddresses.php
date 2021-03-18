<?php

namespace Controller\Admin\Customer;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');

class CustomerAddresses extends \Controller\Core\Admin{
    
    public function saveAction() {
        
        try {
            if(!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            
            $customer_id = $this->getRequest()->getGet('id');
            $customerAddresses = \Mage::getModel('Model_Customer_CustomerAddresses');
            if(!$customer_id) {
                throw new \Exception("Invalid Id.");
            }
            echo '<pre>';
            $shipping = $this->getRequest()->getPost('shipping');
            $billing = $this->getRequest()->getPost('billing');
            
            $customerAddresses->setData($shipping);
            $customerAddresses->addressType = 'shipping';
            $customerAddresses->customer_id = $customer_id;
            
            $query = "SELECT * FROM `customerAddresses` WHERE `customer_id` = $customer_id AND `addressType` = 'shipping' ";
            if($address = $customerAddresses->fetchRow($query)) {
                $customerAddresses->address_id = $address->address_id;
            }

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
            
            $this->redirect('Admin_customer','edit',['id' => $customerAddresses->customer_id]);
        }
        catch(\Exception $e) {
            // echo $e->getMessage();
            $customerAddresses = \Mage::getModel('Model_Admin_Message');
            $customerAddresses->start();
            $customerAddresses->setFailure($e->getMessage());
        }
    }
    
        // public function addAction() {
        //     $layout = $this->getLayout();
        //     $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
        //     $content = $layout->getContent();
        //     $customerAddresses = \Mage::getBlock('Block_Admin_Customer_Edit_Tabs_Addresses');
        //     $content->addChild($customerAddresses, 'customerAddresses');
    
        //     $leftBar = $layout->getChild('leftBar');
        //     $tab = \Mage::getBlock('Block_Admin_Customer_Edit_Tabs');
        //     $leftBar->addChild($tab, 'tab');
            
        //     $this->renderLayout();
                
        // }
    
}







?>