<?php

namespace Controller\Admin;






class Cms extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $cmsGrid = \Mage::getBlock('Block\Admin\Cms\grid');
        $content->addChild($cmsGrid, 'cmsGrid');
        $this->renderLayout();
    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $cms = \Mage::getModel('Model\Cms');
            if($id) {
                $cms = \Mage::getModel('Model\Cms')->load($id);
                if(!$cms) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            $content = $layout->getContent();
            $cmsEdit = \Mage::getBlock('Block\Admin\Cms\Edit')->setCms($cms);
            $content->addChild($cmsEdit, 'cmsEdit');
            
            $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Cms','index');
            exit(0);
        
        }
    }

    public function saveAction() {

        try {
        }
        catch(\Exception $e) {
                echo $e->getMessage();

        }
    }

    

    public function deleteAction() {
        try {
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
        

    }
    
    public function updateAction() {
        try {
            

        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    
    
}







?>