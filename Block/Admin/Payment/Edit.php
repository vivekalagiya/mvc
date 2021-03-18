<?php

namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block_Core_Template');


class Edit extends \Block\Core\Template 
{

    public $payment = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/payment/edit.php');
    }

    public function setPayment($payment = Null) {
        if(!$payment) {
            $payment = \Mage::getModel('Model_Payment');
            if($id = $payment->getGet('id')) {
                $payment->load($id);
            }
        }
        $this->payment = $payment;
        return $this;
    }

    public function getPayment() {
        if(!$this->payment) {
            $this->setPayment();
        }
        return $this->payment;
    }

}
