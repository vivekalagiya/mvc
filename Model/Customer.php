<?php 

namespace Model;


class Customer extends \Model\Core\Table{

    public function __construct() {

        $this->setTableName('customers');
        $this->setPrimaryKey('customer_id');

    }

    public function getCustomerBillingAddress()
    {
        $customerAddress = \Mage::getModel('Model\Customer\CustomerAddresses');
        $query = "SELECT * FROM `{$customerAddress->getTableName()}` WHERE `customer_id` = '{$this->customer_id}' AND `addressType` = 'billing' ";
        $customerAddress = \Mage::getModel('Model\Customer\CustomerAddresses')->fetchRow($query);
        return $customerAddress;
    }

    public function getCustomerShippingAddress()
    {
        $customerAddress = \Mage::getModel('Model\Customer\CustomerAddresses');
        $query = "SELECT * FROM `{$customerAddress->getTableName()}` WHERE `customer_id` = '{$this->customer_id}' AND `addressType` = 'shipping' ";
        $customerAddress = \Mage::getModel('Model\Customer\CustomerAddresses')->fetchRow($query);
        return $customerAddress;
    }

}



?>