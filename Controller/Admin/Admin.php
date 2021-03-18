<?php

namespace Controller\Admin;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


class Admin extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $adminGrid = \Mage::getBlock('Block_Admin_Admin_grid');
        $content->addChild($adminGrid, 'adminGrid');
        $this->renderLayout();
    }

    public function editAction() {
        
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
        $content = $layout->getContent();
        $adminEdit = \Mage::getBlock('Block_Admin_Admin_Edit');
        $content->addChild($adminEdit, 'adminEdit');
        $this->renderLayout();
    }

    public function addAction() {
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
        $content = $layout->getContent();
        $adminForm = \Mage::getBlock('Block_Admin_Admin_Edit');
        $content->addChild($adminForm, 'adminForm');
        $this->renderLayout();
    }

    public function saveAction() {

        try {
            $admin_id = $this->getRequest()->getGet('id');
            if(!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            $postData = $this->getRequest()->getPost('admin');
            $admin = \Mage::getModel('Model_Admin')->load($admin_id);
            $admin->setData($postData);
            if($admin->status == 'enabled') {
                $admin->status = 1;
            } else {
                $admin->status = 0;
            }
            $admin->createdDate = date('Y-m-d h:i:s');
            $admin->save();
            $this->redirect('Admin_admin','index');
            exit(0);
        }
        catch(\Exception $e) {
                echo $e->getMessage();

        }
    }

    

    public function deleteAction() {
        try {
            $this->setRequest();
            $admin_id = ( int) $this->request->getGet('id');
            if(!$admin_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `admin` WHERE `admin`.`admin_id` = {$admin_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Admin_admin','index');
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function statusAction() {
        try {
            $this->setRequest();
            $admin_id = ( int) $this->request->getGet('id');
            if(!$admin_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `admin` SET `admin_id` = '{$admin_id}', `status` = '{$status}'
                      WHERE `admin`.`admin_id` = {$admin_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Admin_Admin','index');
            exit(0);
        }
        catch(\Exception $e) {
            $e->getMessage();
        }
        
        
    }
    
}







?>