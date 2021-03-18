<?php

namespace Controller\Admin;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


class Attribute extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $attributeGrid = \Mage::getBlock('Block_Admin_Attribute_grid');
        $content->addChild($attributeGrid, 'AttributeGrid');
        $this->renderLayout();
    }

    public function editAction() {
        
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
        $content = $layout->getContent();
        $attributeEdit = \Mage::getBlock('Block_Admin_Attribute_Edit');
        $content->addChild($attributeEdit, 'AttributeEdit');
        $this->renderLayout();
    }

    public function addAction() {
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
        $content = $layout->getContent();
        $attributeEdit = \Mage::getBlock('Block_Admin_Attribute_Edit');
        $content->addChild($attributeEdit, 'AttributeEdit');
        $this->renderLayout();
    }

    public function saveAction() {

        try {
            $this->setRequest();
            if(!$this->request->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            $id = $this->getRequest()->getGet('id');
            $attribute = \Mage::getModel('Model_attribute')->load($id);
            $postData = $this->getRequest()->getPost('attribute');
            $attribute->setData($postData);
            $attribute->save();
            $query = "ALTER TABLE `{$attribute->entityType_id}` ADD `{$attribute->code}` {$attribute->backendType} ";
            $attribute->insert($query);

            $this->redirect('Admin_attribute','index');
            exit(0);
        }
        catch(\Exception $e) {
                echo $e->getMessage();

        }
    }

    
    public function deleteAction() {
        try {
            $attribute_id = ( int) $this->getRequest()->getGet('id');
            $entityType_id = $this->getRequest()->getGet('entityType_id');
            $code = $this->getRequest()->getGet('code');
            if(!$attribute_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `attribute` WHERE `attribute`.`attribute_id` = {$attribute_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            
            $query =  "ALTER TABLE `{$entityType_id}` DROP `{$code}`;";
            $adapter->insert($query);
            $this->redirect('Admin_attribute','index');
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function optionAction()
    {
        try {
            $attribute_id = ( int) $this->getRequest()->getGet('id');
            if(!$attribute_id) {
                throw new \Exception("Invalid Request.");
            }
            $attribute = \Mage::getModel('Model_Attribute')->load($attribute_id);

            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/one_column.php');
            $content = $layout->getContent();
            $optionBlock = \Mage::getBlock('Block_Admin_Attribute_Option_Grid')->setAttribute($attribute);
            // echo '<pre>';
            // print_r($optionBlock);die;
            $content->addChild($optionBlock, 'optionBlock');
            $this->renderLayout();
            
        } catch (\Exception $e) {
            echo $e->getMesage();
        }
    }
    
}







?>