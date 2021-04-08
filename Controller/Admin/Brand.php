<?php

nameSpace Controller\Admin;

class Brand extends \Controller\Core\Admin 
{
    public function indexAction()
    {
        $layout = $this->getlayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $brand =  \Mage::getBlock('Block\Admin\Brand\Grid');
        $content->addChild($brand);
        $this->renderLayout();
    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $brand = \Mage::getModel('Model\Brand');
            if($id) {
                $brand = \Mage::getModel('Model\Brand')->load($id);
                if(!$brand) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            $content = $layout->getContent();
            $brandEdit = \Mage::getBlock('Block\Admin\Brand\Edit')->setBrand($brand);
            $content->addChild($brandEdit, 'brandEdit');
            
            $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Brand','index');
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
            $brand = \Mage::getModel('Model\Brand')->load($id);
            $postData = $this->getRequest()->getPost('brand');
            $brand->setData($postData);
            if($brand->status == 'enabled') {
                $brand->status = 1;
            } else {
                $brand->status = 0;
            }
            $brand->createdDate = date('Y-m-d h:i:s');
            $brand->save();
            $this->redirect('Brand','index');
            exit(0);
        }
        catch(\Exception $e) {
                echo $e->getMessage();

        }
    }

    public function deleteAction() {
        try {
            $this->setRequest();
            $brand_id = ( int) $this->request->getGet('id');
            if(!$brand_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `brand` WHERE `brand`.`brand_id` = {$brand_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Brand','index');
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
        

    }
    
    public function statusAction() {
        try {
            $this->setRequest();
            $brand_id = ( int) $this->request->getGet('id');
            if(!$brand_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `brand` SET `brand_id` = '{$brand_id}', `status` = '{$status}'
                      WHERE `brand`.`brand_id` = {$brand_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Brand','index');
            exit(0);
        }
        catch(\Exception $e) {
            $e->getMessage();
        }
        
        
    }

}



?>