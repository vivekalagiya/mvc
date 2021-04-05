<?php

namespace Block\Admin\Payment;




class Edit extends \Block\Core\Template 
{

    public $payment = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/payment/edit.php');
    }

    public function setPayment($payment) {
        
        $this->payment = $payment;
        return $this;
    }

    public function getPayment() {
        
        return $this->payment;
    }

}
