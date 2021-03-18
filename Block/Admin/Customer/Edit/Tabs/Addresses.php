<?php 

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class Addresses extends \Block\Core\Template
{
    protected $shipping = null;
    protected $billing = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/Edit/Tabs/addresses.php');
    }

    public function setShipping($shipping = Null)
    {
        if(!$shipping) {
            $shipping = \Mage::getModel('Model_Customer_customerAddresses');
            $id = (int) $this->getRequest()->getGet('id');
            if($id) {
                $query = "SELECT * FROM `customerAddresses` WHERE `customer_id` = $id AND `addressType` = 'shipping' ";
                if($shipping->fetchRow($query)) {
                    $shipping = $shipping->fetchRow($query);
                }
            }
        }
        $this->shipping = $shipping;
        return $this;
    }
    
    public function getShipping()
    {
        if(!$this->shipping) {
            $this->setShipping();
        }
        return $this->shipping;
    }
    
    public function setBilling($billing = Null)
    {
        if(!$billing) {
            $billing = \Mage::getModel('Model_Customer_customerAddresses');
            $id = (int) $this->getRequest()->getGet('id');
            if($id) {
                $query = "SELECT * FROM `customerAddresses` WHERE `customer_id` = $id AND `addressType` = 'billing' ";
                if($billing->fetchRow($query)) {
                    $billing = $billing->fetchRow($query);
                }
            }
        }
        $this->billing = $billing;
        return $this;   
    }

    public function getBilling()
    {
        if(!$this->billing) {
            $this->setBilling();
        }
        return $this->billing;
    }
}


?>