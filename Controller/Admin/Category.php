<?php

namespace Controller\Admin;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');
\Mage::loadFiLeByClassName('Model_Category');


class Category extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $categoryGrid = \Mage::getBlock('Block_Admin_Category_grid');
        $content->addChild($categoryGrid, 'categoryGrid');
        $this->renderLayout();

    }

    public function addAction() {              
        
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');

        $content = $layout->getContent();
        $categoryEdit = \Mage::getBlock('Block_Admin_Category_Edit');
        $content->addChild($categoryEdit, 'categoryEdit');
        
        $leftBar = $layout->getLeftBar();
        $tab = \Mage::getBlock('Block_Admin_Category_Edit_Tabs');
        $leftBar->addChild($tab, 'tab');
        
        $this->renderLayout();
    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $category = \Mage::getModel('Model_Category');
            if($id) {
                $category = \Mage::getModel('Model_Category')->load($id);
                if(!$category) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            $content = $layout->getContent();
            $categoryEdit = \Mage::getBlock('Block_Admin_Category_Edit')->setCategory($category);
            $content->addChild($categoryEdit, 'categoryEdit');
            
            $leftBar = $layout->getLeftBar();
            $tab = \Mage::getBlock('Block_Admin_Category_Edit_Tabs');
            $leftBar->addChild($tab, 'tab');
            $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Admin_Category','index');
            exit(0);
        
        }
    }
    
    public function saveAction() {
        
        try {
            if(!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            $category = \Mage::getBlock('Block_Admin_Category_Edit')->getCategory();
            if(!$category) {
                throw new \Exception("Invalid Id.");
            }
            
            $postData = $this->getRequest()->getPost('category');
            $category->setData($postData);
            $category->save();

            $path_id = $category->path_id;            
            $category->updatePathId($category);
            $category->updateChildrenPathId($path_id);
            $this->redirect('Admin_Category','index');
            exit(0);                 
        }
        
        catch(\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Admin_Category','index');
            exit(0);
        }
        
    }
    
    public function deleteAction() {
        try {
            $category_id = (int) $this->getRequest()->getGet('id');
            if(!$category_id) {
                throw new \Exception("Invalid delete Request.");
            }
            
            $category = \Mage::getModel('Model_Category')->load($category_id);
            $parent_id = $category->parent_id;
            $path_id = $category->path_id;
            $category->updateChildrenPathId($path_id, $parent_id);
            $category->delete($category_id);

            $this->getMessage()->setSuccess('Record Deleted Successfully.');
            $this->redirect('Admin_category','index');
        }
        catch(\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Admin_category','index');
        }
    }
    
    public function statusAction() {
        try {
            $category_id = (int) $this->getRequest()->getGet('id');
            if(!$category_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = (int) $this->request->getGet('status');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `category`
                      SET  `status` = '{$status}'
                      WHERE `category`.`category_id` = '{$category_id}'";

            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);   
            $this->getMessage()->setSuccess('Status Change Successfully.');
            $this->redirect('Admin_category','index');
            exit(0);
        }
        catch(\Exception $e) {   
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Admin_category','index');   
        }
    }
            
}








?>