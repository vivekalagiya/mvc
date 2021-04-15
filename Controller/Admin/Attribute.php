<?php

namespace Controller\Admin;

class Attribute extends \Controller\Core\Admin{

    public function indexAction() {

        
        $attributeGrid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $attributeGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);


        // $layout = $this->getLayout();
        // $layout->setTemplate('./View/core/layout/one_column.php');
        // $content = $layout->getContent();
        // $attributeGrid = \Mage::getBlock('Block\Admin\Attribute\grid');
        // $content->addChild($attributeGrid, 'AttributeGrid');
        // $this->renderLayout();
    }

    public function editAction() {  
        try {
            
            $id = $this->getRequest()->getGet('id');
            $attribute = \Mage::getModel('Model\Attribute');
            if($id) {
                $attribute = \Mage::getModel('Model\Attribute')->load($id);
                if(!$attribute) {
                    throw new \Exception("Invalid Id", 1);
                }
            }

            $attributeEdit = \Mage::getBlock('Block\Admin\Attribute\Edit')->setAttribute($attribute)->toHtml();
            
            $response = [
                'status' => 'success',
                'message' => 'i can do',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $attributeEdit
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);
            
            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            // $content = $layout->getContent();
            // $content->addChild($attributeEdit, 'attributeEdit');
              
            // $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Attribute','index');
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
            $attribute = \Mage::getModel('Model\Attribute')->load($product_id);
            $postData = $this->getRequest()->getPost('attribute');
            $attribute->setData($postData);
            if($attribute->attribute_id) {
                $query = "ALTER TABLE `{$attribute->entityType_id}` CHANGE `{$attribute->code}` `{$attribute->code}` {$attribute->backendType} NULL DEFAULT NULL";
            } else {
                $query = "ALTER TABLE `{$attribute->entityType_id}` ADD `{$attribute->code}` {$attribute->backendType} ";
            }   
            $attribute->insert($query);
            $attribute->save();

            $this->redirect('Attribute','index');
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
            $this->redirect('Attribute','index');
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
            $attribute = \Mage::getModel('Model\Attribute')->load($attribute_id);

            $option = \Mage::getBlock('Block\Admin\Attribute\Option\Grid')->setAttribute($attribute)->toHtml();
            $response = [
                'status' => 'success',
                'message' => 'i can do',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $option
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);
            
            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/one_column.php');
            // $content = $layout->getContent();
            // // echo '<pre>';
            // // print_r($option);die;
            // $content->addChild($option, 'option');
            // $this->renderLayout();
            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }    
}







?>