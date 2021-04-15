<?php

namespace Controller\Admin;


class Product extends \Controller\Core\Admin{

    public function testAction()
    {
        $productGrid = \Mage::getBlock('Block\Admin\Product\grid')->toHtml(); 

        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#productGrid',
                'html' => $productGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response); 
        
    }

    public function gridHtmlAction()
    {
        $productGrid = \Mage::getBlock('Block\Admin\Product\grid')->toHtml(); 

        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $productGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);
        
    }

    public function indexAction() {
        
        $productGrid = \Mage::getBlock('Block\Admin\Product\grid');
        $content = $productGrid->toHtml(); 
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $content
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        // $layout = $this->getLayout();
        // $layout->setTemplate('./View/core/layout/one_column.php');
        // $content = $layout->getContent();
        // $productGrid = \Mage::getBlock('Block\Admin\Product\grid'); 
        // $content->addChild($productGrid, 'productGrid');
        // $this->renderLayout();
    }

    public function editAction() {  
        try {

            $id = $this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model\Product');
            if($id) {
                $product = \Mage::getModel('Model\Product')->load($id);
                if(!$product) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            $productEdit = \Mage::getBlock('Block\Admin\Product\Edit')->setTableRow($product)->toHtml();
            
            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/one_column.php');
    
            // $content = $layout->getContent();
            // $content->addChild($productEdit, 'productEdit');

            // $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->indexAction();
            exit(0);
        
        }

        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $productEdit
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);


    }


    public function saveAction() {

        try {
            $request = $this->getRequest();
            if(!$request->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            $product_id = $request->getGet('id');
            $postData = $request->getPost('product');
            $model = \Mage::getModel('Model\Product')->load($product_id);
            $model->setData($postData);
            
            if($model->status == 'enabled') {
                $status = 1;
            } else {
                $status = 0;
            }
            
            $createdDate = date('Y-m-d h:i:s');
            $updatedDate = date('Y-m-d h:i:s');
            $model->status = $status;
            $model->createdDate = $createdDate;
            $model->updatedDate = $updatedDate;
            $model->save();
            // $this->redirect('Product','index');
            // exit(0);    
            
        }
        catch(\Exception $e) {
            // echo $e->getMessage();
            $model = \Mage::getModel('Model\Admin\Message');
            $model->start();
            $model->setFailure($e->getMessage());
            // $this->redirect('Product','index');
            // exit(0);
        }

        $this->indexAction();
    }
    
    public function deleteAction() {
        try {
            $this->setRequest();
            $product_id = (int) $this->request->getGet('id');
            if(!$product_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `products` WHERE `products`.`product_id` = {$product_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);

            $model = \Mage::getModel('Model\Core\Message');
            $model->start();
            $model->setSuccess('Record Deleted Successfully.');
            // $this->redirect('Product','index');
        }
        catch(\Exception $e) {
            //echo $e->getMessage();
            $model = \Mage::getModel('Model\Core\Message');
            $model->start();
            $model->setFailure($e->getMessage());
            // $this->redirect('Product','index');
        }

        $this->indexAction();

    }

    public function statusAction() {
        try {
            $product_id = (int) $this->getRequest()->getGet('id');
            if(!$product_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            $updatedDate = date('Y-m-d h:i:s');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `products`
                      SET  `status` = '{$status}', `updatedDate` = '{$updatedDate}' 
                      WHERE `products`.`product_id` = {$product_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);   
            $model = \Mage::getModel('Model\Core\Message');
            $model->start();
            $model->setSuccess('Status Change Successfully.');
            // $this->redirect('Product','index');
            // exit(0);

        }
        catch(\Exception $e) {
            // $e->getMessage();
            $model = \Mage::getModel('Model\Core\Message');
            $model->start();
            $model->setFailure($e->getMessage());
            // $this->redirect('Product','index');
        }

        $this->indexAction();
        
    }
    
}







?>