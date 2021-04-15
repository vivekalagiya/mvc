<?php

namespace Controller\Admin;

class Cms extends \Controller\Core\Admin{

    public function indexAction() {

        $cmsGrid = \Mage::getBlock('Block\Admin\Cms\grid')->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $cmsGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        // $layout = $this->getLayout();
        // $layout->setTemplate('./View/core/layout/one_column.php');
        // $content = $layout->getContent();
        // $cmsGrid = \Mage::getBlock('Block\Admin\Cms\grid');
        // $content->addChild($cmsGrid, 'cmsGrid');
        // $this->renderLayout();
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
            $cmsEdit = \Mage::getBlock('Block\Admin\Cms\Edit')->setCms($cms)->toHtml();
            
            $response = [
                'status' => 'success',
                'message' => 'i can do',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $cmsEdit
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);

            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            // $content = $layout->getContent();
            // $content->addChild($cmsEdit, 'cmsEdit');
            
            // $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Cms','index');
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
            $cms = \Mage::getModel('Model\Cms')->load($id);
            $postData = $this->getRequest()->getPost('cms');
            $cms->setData($postData);
            if($cms-d>status == 'enabled') {
                $cms->status = 1;
            } else {
                $cms->status = 0;
            }
            $cms->createdDate = date('Y-m-d h:i:s');
            $cms->save();
            $this->redirect('Cms','index');
            exit(0);
        }
        catch(\Exception $e) {
                echo $e->getMessage();
        }
    }

    public function deleteAction() {
        try {
            $this->setRequest();
            $page_id = ( int) $this->request->getGet('id');
            if(!$page_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `cms_page` WHERE `cms_page`.`page_id` = {$page_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Cms','index');
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function statusAction() {
        try {
            $this->setRequest();
            $page_id = ( int) $this->request->getGet('id');
            if(!$page_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `cms_page` SET `page_id` = '{$page_id}', `status` = '{$status}'
                      WHERE `cms_page`.`page_id` = {$page_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Cms','index');
            exit(0);
        }
        catch(\Exception $e) {
            $e->getMessage();
        }
        
        
    }
    

    
    
}







?>