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
        try {
            
            $id = $this->getRequest()->getGet('id');
            $attribute = \Mage::getModel('Model_Attribute');
            if($id) {
                $attribute = \Mage::getModel('Model_Attribute')->load($id);
                if(!$attribute) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            $content = $layout->getContent();
            $attributeEdit = \Mage::getBlock('Block_Admin_Attribute_Edit')->setAttribute($attribute);
            $content->addChild($attributeEdit, 'attributeEdit');
            
            $leftBar = $layout->getLeftBar();
            $tab = \Mage::getBlock('Block_Admin_Attribute_Edit_Tabs');
            $leftBar->addChild($tab, 'tab');
            $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Admin_Attribute','index');
            exit(0);
        
        }
    }

    public function saveAction() {

        try {
            $this->setRequest();
            if(!$this->request->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            $product_id = $this->getRequest()->getGet('id');
            $attribute = \Mage::getModel('Model_attribute')->load($product_id);
            $postData = $this->getRequest()->getPost('attribute');
            $attribute->setData($postData);
            if($attribute->attribute_id) {
                $query = "ALTER TABLE `{$attribute->entityType_id}` CHANGE `{$attribute->code}` `{$attribute->code}` {$attribute->backendType} NULL DEFAULT NULL";
            } else {
                $query = "ALTER TABLE `{$attribute->entityType_id}` ADD `{$attribute->code}` {$attribute->backendType} ";
            }   
            $attribute->save();
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