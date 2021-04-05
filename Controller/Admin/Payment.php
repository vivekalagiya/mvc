<?php

namespace Controller\Admin;






class Payment extends \Controller\Core\Admin{

    public function indexAction() {

        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/one_column.php');
        $content = $layout->getContent();
        $paymentGrid = \Mage::getBlock('Block\Admin\Payment\grid');
        $content->addChild($paymentGrid, 'paymentGrid');
        $this->renderLayout();
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
            
            $layout = $this->getLayout();
            $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');
    
            $content = $layout->getContent();
            $paymentEdit = \Mage::getBlock('Block\Admin\Payment\Edit')->setPayment($payment);
            $content->addChild($paymentEdit, 'paymentEdit');
            
            $this->renderLayout();
            
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
            $this->redirect('Payment','index');
            exit(0);
        }
        catch(\Exception $e) {
                echo $e->getMessage();

        }
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
            $this->redirect('Payment','index');
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
        

    }
    
    public function updateAction() {
        try {
            $this->setRequest();
            if(!$this->request->isPost()) {
                throw new \Exception ('Invalid Request.');
            }
            $this->request->getPost();
            $payment_id = $_GET['id'];  
            $paymentName = $_POST['paymentName'];
            $code = $_POST['code'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            if($status == 'enabled') {
                $status = 1;
            } else {
                $status = 0;
            }
            $query = "UPDATE `payments` SET `payment_id` = '{$payment_id}', `paymentName` = '{$paymentName}',
                     `code` = '{$code}', `description` = '{$description}', `status` = '{$status}'
                     WHERE `payments`.`payment_id` = {$payment_id}";
            $adapter = new \Model\Core\Adapter();
            $adapter->insert($query);
            $this->redirect('Payment','index');
            exit(0);

        } catch(\Exception $e) {
            echo $e->getMessage();
        }
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
            $this->redirect('Payment','index');
            exit(0);
        }
        catch(\Exception $e) {
            $e->getMessage();
        }
        
        
    }
    
}







?>