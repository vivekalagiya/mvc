<?php

namespace Controller\Admin;







class Customer extends \Controller\Core\Admin{

    public function indexAction() {

        $customerGrid = \Mage::getBlock('Block\Admin\Customer\grid')->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $customerGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        // $layout = $this->getLayout();
        // $layout->setTemplate('./View/core/layout/one_column.php');
        // $content = $layout->getContent();
        // $customerGrid = \Mage::getBlock('Block\Admin\Customer\grid');
        // $content->addChild($customerGrid, 'customerGrid');
        // $this->renderLayout();

    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $customer = \Mage::getModel('Model\Customer');
            if($id) {
                $customer = \Mage::getModel('Model\Customer')->load($id);
                if(!$customer) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            $customerEdit = \Mage::getBlock('Block\Admin\Customer\Edit')->setTableRow($customer)->toHtml();
        
            $response = [
                'status' => 'success',
                'message' => 'i can do',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $customerEdit
                ]
            ];
        
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);
            
            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/one_column.php');
    
            // $content = $layout->getContent();
            // $content->addChild($customerEdit, 'customerEdit');
            
            // $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Customer','index');
            exit(0);
        
        }
    }
    
    public function saveAction() {

        try {
            if(!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Save Request.");
            }
            
            $customer_id = $this->getRequest()->getGet('id');
            $customer = \Mage::getModel('Model\Customer')->load($customer_id);

            if(!$customer) {
               throw new \Exception("Invalid Id.");
            }
            $postData = $this->getRequest()->getPost('customer');
            $customer->setData($postData);

            if($customer->status == 'enabled') {
                $status = 1;
            } else {
                $status = 0;
            }

            $createdDate = date('Y-m-d h:i:s');
            $updatedDate = date('Y-m-d h:i:s');
            $customer->status = $status;
            $customer->createdDate = $createdDate;
            $customer->updatedDate = $updatedDate;

            $customer->save();
            $this->redirect('Customer','index');
            exit(0);    
            
        }
        catch(\Exception $e) {
            // echo $e->getMessage();
            $customer = \Mage::getModel('Model\Admin\Message');
            $customer->start();
            $customer->setFailure($e->getMessage());
            $this->redirect('Customer','index');
            exit(0);
        }
    }
    
    public function deleteAction() {
        try {
            $this->setRequest();
            $customer_id = (int) $this->request->getGet('id');
            if(!$customer_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `customers` WHERE `customers`.`customer_id` = {$customer_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $customer = \Mage::getModel('Model\Core\Message');
            $customer->start();
            $customer->setSuccess('Record Deleted Successfully.');
            $this->redirect('Customer','index');
        }
        catch(\Exception $e) {
            //echo $e->getMessage();
            $customer = \Mage::getModel('Model\Core\Message');
            $customer->start();
            $customer->setFailure($e->getMessage());
            $this->redirect('Customer','index');
        }

    }

    public function statusAction() {
        try {
            $this->setRequest();
            $customer_id = ( int) $this->request->getGet('id');
            if(!$customer_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            $updatedDate = date('Y-m-d h:i:s');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `customers`
                      SET  `status` = '{$status}', `updatedDate` = '{$updatedDate}' 
                      WHERE `customers`.`customer_id` = '{$customer_id}'";

            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $customer = \Mage::getModel('Model\Core\Message');
            $customer->start();
            $customer->setSuccess('Status Change Successfully.');
            $this->redirect('Customer','index');
            exit(0);
        }
        catch(\Exception $e) {
            // $e->getMessage();
            $customer = \Mage::getModel('Model\Core\Message');
            $customer->start();
            $customer->setFailure($e->getMessage());
            $this->redirect('Customer','index');
            
        }
        
        
    }
    
}








?>