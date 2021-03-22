<?php

namespace Controller\Admin;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


class Customer extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $customerGrid = \Mage::getBlock('Block_Admin_Customer_grid');
        $content->addChild($customerGrid, 'customerGrid');
        $this->renderLayout();

    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $customer = \Mage::getModel('Model_Customer');
            if($id) {
                $customer = \Mage::getModel('Model_Customer')->load($id);
                if(!$customer) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            $content = $layout->getContent();
            $customerEdit = \Mage::getBlock('Block_Admin_Customer_Edit')->setCustomer($customer);
            $content->addChild($customerEdit, 'customerEdit');
            
            $leftBar = $layout->getLeftBar();
            $tab = \Mage::getBlock('Block_Admin_Customer_Edit_Tabs');
            $leftBar->addChild($tab, 'tab');
            $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Admin_Customer','index');
            exit(0);
        
        }
    }
    
    // public function groupAction()
    // {
    //     $layout = $this->getLayout();
    //     $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');

    //     $content = $layout->getContent();
    //     $customerGroup = \Mage::getBlock('Block_Admin_Customer_Group');
    //     $content->addChild($customerForm, 'customerGroup');

    //     $leftBar = $layout->getChild('leftBar');
    //     $tab = \Mage::getBlock('Block_Admin_Customer_Edit_Tabs');
    //     $leftBar->addChild($tab, 'tab');
        
    //     $this->renderLayout();
    // }

    // public function addressAction()
    // {
    //     $layout = $this->getLayout();
    //     $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');

    //     $content = $layout->getContent();
    //     $customerAddress = \Mage::getBlock('Block_Admin_Customer_Address');
    //     $content->addChild($customerForm, 'customerAddress');

    //     $leftBar = $layout->getChild('leftBar');
    //     $tab = \Mage::getBlock('Block_Admin_Customer_Edit_Tabs');
    //     $leftBar->addChild($tab, 'tab');
        
    //     $this->renderLayout();
    // }

    public function saveAction() {

        try {
            if(!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            
            $customer_id = $this->getRequest()->getGet('id');
            $customer = \Mage::getModel('Model_Customer')->load($customer_id);

            if(!$customer) {
               throw new \Exception("Invalid Id.");
            }
            $postData = $this->getRequest()->getPost('customer');
            $customer->setData($postData);

            if($customer->status == 'enabled') {
                $status = 1;
            } else {
                $status = 0;
            }

            $createdDate = date('Y-m-d h:i:s');
            $updatedDate = date('Y-m-d h:i:s');
            $customer->status = $status;
            $customer->createdDate = $createdDate;
            $customer->updatedDate = $updatedDate;

            $customer->save();
            $this->redirect('Admin_Customer','index');
            exit(0);    
            
        }
        catch(\Exception $e) {
            // echo $e->getMessage();
            $customer = \Mage::getModel('Model_Admin_Message');
            $customer->start();
            $customer->setFailure($e->getMessage());
            $this->redirect('Admin_Customer','index');
            exit(0);
        }
    }
    
    public function deleteAction() {
        try {
            $this->setRequest();
            $customer_id = (int) $this->request->getGet('id');
            if(!$customer_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `customers` WHERE `customers`.`customer_id` = {$customer_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $customer = \Mage::getModel('Model_Core_Message');
            $customer->start();
            $customer->setSuccess('Record Deleted Successfully.');
            $this->redirect('Admin_customer','index');
        }
        catch(\Exception $e) {
            //echo $e->getMessage();
            $customer = \Mage::getModel('Model_Core_Message');
            $customer->start();
            $customer->setFailure($e->getMessage());
            $this->redirect('Admin_customer','index');
        }

    }

    public function statusAction() {
        try {
            $this->setRequest();
            $customer_id = ( int) $this->request->getGet('id');
            if(!$customer_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            $updatedDate = date('Y-m-d h:i:s');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `customers`
                      SET  `status` = '{$status}', `updatedDate` = '{$updatedDate}' 
                      WHERE `customers`.`customer_id` = '{$customer_id}'";

            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $customer = \Mage::getModel('Model_Core_Message');
            $customer->start();
            $customer->setSuccess('Status Change Successfully.');
            $this->redirect('Admin_customer','index');
            exit(0);
        }
        catch(\Exception $e) {
            // $e->getMessage();
            $customer = \Mage::getModel('Model_Core_Message');
            $customer->start();
            $customer->setFailure($e->getMessage());
            $this->redirect('Admin_customer','index');
            
        }
        
        
    }
    
}








?>