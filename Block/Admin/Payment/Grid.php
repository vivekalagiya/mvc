<?php

namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block_Core_Template');


class Grid extends \Block\Core\Template 
{

    public $payments = NULL;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Payment/grid.php');
    }

    public function setPayments($payments = Null) {
        if(!$payments) {
            $payments = \Mage::getModel('Model_Payment');
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
