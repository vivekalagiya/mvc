<?php

namespace Controller\Admin\Customer;






class CustomerGroup extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $customerGroup = \Mage::getBlock('Block\Admin\Customer\CustomerGroup\Grid');
        $content->addChild($customerGroup, 'customerGroup');
        $this->renderLayout();

    }


    public function editAction() {
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');

        $content = $layout->getContent();
        $customerGroup = \Mage::getBlock('Block\Admin\Customer\CustomerGroup\Edit');
        $content->addChild($customerGroup, 'customerGroup');
        
        $this->renderLayout();
            
    }

    public function saveAction() {

        try {
            echo '<pre>';
            if(!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            
            $group_id = $this->getRequest()->getGet('id');
            $customerGroup = \Mage::getModel('Model\Customer\CustomerGroup')->load($group_id);
            if(!$customerGroup) {
               throw new \Exception("Invalid Id.");
            }
            $postData = $this->getRequest()->getPost('customerGroup');
            $customerGroup->setData($postData);
            
            $customerGroup->save();
            $this->redirect('Customer\CustomerGroup','index');
            
        }
        catch(\Exception $e) {
            $customerGroup = \Mage::getModel('Model\Admin\Message');
            $customerGroup->start();
            $customerGroup->setFailure($e->getMessage());
        }
    }
    
     public function deleteAction() {
        try {
            $this->setRequest();
            $group_id = (int) $this->request->getGet('id');
            if(!$group_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `customerGroup` WHERE `customerGroup`.`group_id` = {$group_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->delete($query);
            $customerGroup = \Mage::getModel('Model\Core\Message');
            $customerGroup->start();
            $customerGroup->setSuccess('Record Deleted Successfully.');
            $this->redirect('Customer\CustomerGroup','index');
        }
        catch(\Exception $e) {
            //echo $e->getMessage();
            $customerGroup = \Mage::getModel('Model\Core\Message');
            $customerGroup->start();
            $customerGroup->setFailure($e->getMessage());
            $this->redirect('Customer\CustomerGroup','index');
        }

    }

    public function defaultAction() {
        try {
            $this->setRequest();
            $group_id = ( int) $this->request->getGet('id');
            if(!$group_id) {
                throw new \Exception("Invalid Request.");
            }
            $default = ( int)$this->request->getGet('default');
            if(!$default) {
                $default = 1;
            } else {
                $default = 0;
            }

            $adapter = new \Model\Core\Adapter();
            $query = "UPDATE `customerGroup`
                      SET  `default` = 0 ";
            $adapter->update($query);

            $query = "UPDATE `customerGroup`
                      SET  `default` = '{$default}'
                      WHERE `customerGroup`.`group_id` = '{$group_id}'";
            $adapter->update($query);

            $customerGroup = \Mage::getModel('Model\Core\Message');
            $customerGroup->start();
            $customerGroup->setSuccess('Make default Successfully.');
            $this->redirect('Customer\CustomerGroup','index');
            exit(0);
        }
        catch(\Exception $e) {
            // $e->getMessage();
            $customerGroup = \Mage::getModel('Model\Core\Message');
            $customerGroup->start();
            $customerGroup->setFailure($e->getMessage());
            $this->redirect('Customer\CustomerGroup','index');
            
        }
    }
}







?>