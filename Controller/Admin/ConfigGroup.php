<?php

namespace Controller\Admin;

class ConfigGroup extends \Controller\Core\Admin{

    public function indexAction() {

        $configGroup = \Mage::getBlock('Block\Admin\ConfigGroup\grid')->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $configGroup
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        // $layout = $this->getLayout();
        // $layout->setTemplate('./View/core/layout/one_column.php');
        // $content = $layout->getContent();
        // $configGroup = \Mage::getBlock('Block\Admin\ConfigGroup\grid');
        // $content->addChild($configGroup, 'configGroup');
        // $this->renderLayout();
    }

    public function editAction() {  
        try {
            
            $id = $this->getRequest()->getGet('id');
            $configGroup = \Mage::getModel('Model\ConfigGroup');
            if($id) {
                $configGroup = \Mage::getModel('Model\ConfigGroup')->load($id);
                if(!$configGroup) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            $configGroupEdit = \Mage::getBlock('Block\Admin\ConfigGroup\Edit')->setTableRow($configGroup)->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'i can do',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $configGroupEdit
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);
            
            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/one_column.php');
            
            // $content = $layout->getContent();
            // $content->addChild($configGroupEdit, 'configGroupEdit');
              
            // $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('ConfigGroup','index');
            exit(0);
        }
    }

    public function saveAction() {

        try {
            $this->setRequest();
            if(!$this->request->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            $group_id = $this->getRequest()->getGet('id');
            $configGroup = \Mage::getModel('Model\ConfigGroup')->load($group_id);
            $postData = $this->getRequest()->getPost('configGroup');
            $configGroup->setData($postData);
            $configGroup->createdDate = date('Y-m-d H:i:s');
            $configGroup->save();

            $this->redirect('ConfigGroup','edit', ['id' => $configGroup->group_id]);
            exit(0);
        }
        catch(\Exception $e) {
                echo $e->getMessage();

        }
    }
    
    public function deleteAction() {
        try {
            $group_id = ( int) $this->getRequest()->getGet('id');
            $entityType_id = $this->getRequest()->getGet('entityType_id');
            $code = $this->getRequest()->getGet('code');
            if(!$group_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $confiGroup = \Mage::getModel('Model\ConfigGroup')->delete($group_id);
            $this->getMessage()->setSuccess('Record Deleted Successfully.');
            $this->redirect('ConfigGroup','index');
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
}







?>