<?php

namespace Controller\Admin;


class Shipping extends \Controller\Core\Admin{

    public function indexAction() {

        $shippingGrid = \Mage::getBlock('Block\Admin\Shipping\grid')->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $shippingGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        // $layout = $this->getLayout();
        // $layout->setTemplate('./View/core/layout/one_column.php');
        // $content = $layout->getContent();
        // $shippingGrid = \Mage::getBlock('Block\Admin\Shipping\grid');
        // $content->addChild($shippingGrid, 'shippingGrid');
        // $this->renderLayout();
    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $shipping = \Mage::getModel('Model\Shipping');
            if($id) {
                $shipping = \Mage::getModel('Model\Shipping')->load($id);
                if(!$shipping) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $shippingEdit = \Mage::getBlock('Block\Admin\Shipping\Edit')->setShipping($shipping)->toHtml();
            
            $response = [
                'status' => 'success',
                'message' => 'i can do',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $shippingEdit
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);

            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            // $content = $layout->getContent();
            // $content->addChild($shippingEdit, 'shippingEdit');
            
            // $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Shipping','index');
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
            $shipping = \Mage::getModel('Model\Shipping')->load($id);
            $postData = $this->getRequest()->getPost('shipping');
            $shipping->setData($postData);
            if($shipping-d>status == 'enabled') {
                $shipping->status = 1;
            } else {
                $shipping->status = 0;
            }
            $shipping->createdDate = date('Y-m-d h:i:s');
            $shipping->save();
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
        $this->redirect('Shipping','index');
        exit(0);
    }

    public function deleteAction() {
        try {
            $this->setRequest();
            $shipping_id = ( int) $this->request->getGet('id');
            if(!$shipping_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `shippings` WHERE `shippings`.`shipping_id` = {$shipping_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
        $this->redirect('Shipping','index');
    }

    public function statusAction() {
        try {
            $this->setRequest();
            $shipping_id = ( int) $this->request->getGet('id');
            if(!$shipping_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `shippings` SET `shipping_id` = '{$shipping_id}', `status` = '{$status}'
                      WHERE `shippings`.`shipping_id` = {$shipping_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
        }
        catch(\Exception $e) {
            $e->getMessage();
        }
        $this->redirect('Shipping','index');
        exit(0);
        
        
    }
    
}







?>