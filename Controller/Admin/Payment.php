<?php

namespace Controller\Admin;






class Payment extends \Controller\Core\Admin{

    public function indexAction() {

        $paymentGrid = \Mage::getBlock('Block\Admin\Payment\grid')->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $paymentGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        // $layout = $this->getLayout();
        // $layout->setTemplate('./View/core/layout/one_column.php');
        // $content = $layout->getContent();
        // $paymentGrid = \Mage::getBlock('Block\Admin\Payment\grid');
        // $content->addChild($paymentGrid, 'paymentGrid');
        // $this->renderLayout();
    }

    public function editAction() {  
        try {
            $id = $this->getRequest()->getGet('id');
            $payment = \Mage::getModel('Model\Payment');
            if($id) {
                $payment = \Mage::getModel('Model\Payment')->load($id);
                if(!$payment) {
                    throw new \Exception("Invalid Id", 1);
                }
            }
            
            $paymentEdit = \Mage::getBlock('Block\Admin\Payment\Edit')->setPayment($payment)->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'i can do',
                'element' => [
                    'selector' => '#contentHtml',
                    'html' => $paymentEdit
                ]
            ];
            
            header("Content-type: application/json; charset=utf-8");
            echo json_encode($response);

            // $layout = $this->getLayout();
            // $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            // $content = $layout->getContent();
            // $content->addChild($paymentEdit, 'paymentEdit');
            
            // $this->renderLayout();
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('Payment','index');
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
            $postData = $this->getRequest()->getPost('payment');
            $payment = \Mage::getModel('Model\Payment')->load($id);
            $payment->setData($postData );

            if($payment->status == 'enabled') {
                $payment->status = 1;
            } else {
                $payment->status = 0;
            }
            $payment->save();
        }
        catch(\Exception $e) {
            echo $e->getMessage();
            
        }
        $this->redirect('Payment','index');
    }

    

    public function deleteAction() {
        try {
            $this->setRequest();
            $payment_id = ( int) $this->request->getGet('id');
            if(!$payment_id) {
                throw new \Exception("Invalid delete Request.");
            }
            $query = "DELETE FROM `payments` WHERE `payments`.`payment_id` = {$payment_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
        
        $this->redirect('Payment','index');

    }

    public function statusAction() {
        try {
            $this->setRequest();
            $payment_id = ( int) $this->request->getGet('id');
            if(!$payment_id) {
                throw new \Exception("Invalid Request.");
            }
            $status = ( int) $this->request->getGet('status');
            if(!$status) {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `payments` SET `payment_id` = '{$payment_id}', `status` = '{$status}' WHERE `payments`.`payment_id` = {$payment_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
        }
        catch(\Exception $e) {
            $e->getMessage();
        }
        $this->redirect('Payment','index');
        
    }
    
}







?>