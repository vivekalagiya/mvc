<?php


namespace Model\Cart;

class Address extends \Model\Core\Table 
{
    protected $cart = Null;
    
    public function __construct()
    {
        $this->setTableName('cartAddress');
        $this->setPrimaryKey('cartAddress_id');
    }
    
    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        if(!$this->cart_id) {
            return false;
        }

        $cart = \Mage::getModel('\Model\Cart')->load($this->cart_id);
        $this->setCart($cart);
        return $this->cart;
    }

    public function setCustomerBillingAddress($billingAddress)
    {
        $this->customerBillingAddress = $billingAddress;
    }

    public function getCustomerBillingAddress()
    {
        print_r($this->getCart());
    }

}

