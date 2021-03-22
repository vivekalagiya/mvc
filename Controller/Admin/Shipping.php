<?php

namespace Controller\Admin;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


class Shipping extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $shippingGrid = \Mage::getBlock('Block_Admin_Shipping_grid');
        $content->addChild($shippingGrid, 'shippingGrid');
        $this->renderLayout();
    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $shipping = \Mage::getModel('Model_Shipping');
            if($id) {
                $shipping = \Mage::getModel('Model_Shipping')->load($id);
                if(!$shipping) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            $content = $layout->getContent();
            $shippingEdit = \Mage::getBlock('Block_Admin_Shipping_Edit')->setShipping($shipping);
            $content->addChild($shippingEdit, 'shippingEdit');
            
            $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Admin_Shipping','index');
            exit(0);
        
        }
    }

    public function saveAction() {

        try {
            $this->setRequest();
            if(!$this->request->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            $id = $this->getRequest()->getGet('id');
            $shipping = \Mage::getModel('Model_shipping')->load($id);
            $postData = $this->getRequest()->getPost('shipping');
            $shipping->setData($postData);
            if($shipping->status == 'enabled') {
                $shipping->status = 1;
            } else {
                $shipping->status = 0;
            }
            $shipping->createdDate = date('Y-m-d h:i:s');
            $shipping->save();
            $this->redirect('Admin_shipping','index');
            exit(0);
        }
        catch(\Exception $e) {
                echo $e->getMessage();

        }
    }

    

    public function deleteAction() {
        try {
            $this->setRequest();
            $shipping_id = ( int) $this->request->getGet('id');
            if(!$shipping_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `shippings` WHERE `shippings`.`shipping_id` = {$shipping_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Admin_shipping','index');
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
        

    }
    
    public function updateAction() {
        try {
            $this->setRequest();
            if(!$this->request->isPost()) {
                throw new \Exception ('Invalid Request.');
            }
            $this->request->getPost();
            $shipping_id = $_GET['id'];  
            $methodName = $_POST['methodName'];
            $code = $_POST['code'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            if($status == 'enabled') {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `shippings` SET `shipping_id` = '{$shipping_id}', `methodName` = '{$methodName}', `code` = '{$code}',
                    `amount` = '{$amount}', `description` = '{$description}', `status` = '{$status}'
                     WHERE `shippings`.`shipping_id` = {$shipping_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Admin_Shipping','index');
            exit(0);

        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function statusAction() {
        try {
            $this->setRequest();
            $shipping_id = ( int) $this->request->getGet('id');
            if(!$shipping_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `shippings` SET `shipping_id` = '{$shipping_id}', `status` = '{$status}'
                      WHERE `shippings`.`shipping_id` = {$shipping_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Admin_Shipping','index');
            exit(0);
        }
        catch(\Exception $e) {
            $e->getMessage();
        }
        
        
    }
    
}







?>