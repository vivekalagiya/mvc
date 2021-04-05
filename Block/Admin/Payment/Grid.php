<?php

namespace Block\Admin\Payment;




class Grid extends \Block\Core\Template 
{

    public $payments = NULL;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Payment/grid.php');
    }

    public function setPayments($payments = Null) {
        if(!$payments) {
            $payments = \Mage::getModel('Model\Payment');
            $payments = $payments->fetchAll();
        }
        $this->payments = $payments;
        return $this;
    }

    public function getPayments() {
        if(!$this->payments) {
            $this->setPayments();
        }
        return $this->payments;

    }
}
