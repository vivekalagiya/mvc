<?php

namespace Model;

class Cart extends Core\Table 
{

    protected $customer = Null;
    protected $items = Null;
    protected $billingAddress = Null;
    protected $shippingAddress = Null;
    protected $shippingMethod = Null;
    protected $paymentMethod = Null;

    public function __construct()
    {
        $this->setTableName('cart');
        $this->setPrimaryKey('cart_id');
    }

    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer()
    {
        if(!$this->customer_id) {
            return false;   
        }
        $customer = \Mage::getModel('Model\Customer')->load($this->customer_id);
        $this->setCustomer($customer);
        return $this->customer;
    }

    public function setPaymentMethod(\Model\Payment\Collection $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getPaymentMethod()
    {
        $paymentMethod = \Mage::getModel('Model\Payment')->fetchAll();
        $this->setPaymentMethod($paymentMethod);
        return $this->paymentMethod;    
    }

    public function setShippingMethod(\Model\Shipping\Collection $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
        return $this;
    }

    public function getShippingMethod()
    {
        $shippingMethod = \Mage::getModel('Model\Shipping')->fetchAll();
        $this->setShippingMethod($shippingMethod);
        return $this->shippingMethod;
    }

    public function setItems(\Model\cart\Item\Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    public function getItems()
    {
        if(!$this->cart_id) {
            return false;   
        }
        $query = "SELECT * FROM `cartItem` WHERE cart_id = '{$this->cart_id}' ";
        $items = \Mage::getModel('Model\Cart\Item')->fetchAll($query);
        if(!$items) {
            return null;
        }
        $this->setItems($items);
        return $this->items;
    }

    public function setBillingAddress(\Model\Cart\Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    public function getbillingAddress()
    {
        if(!$this->cart_id) {
            return false;   
        }
        $query = "SELECT * FROM `cartAddress` WHERE `cart_id` = '{$this->cart_id}' AND `addressType` = 'billing' ";
        $billingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);
        if(!$billingAddress) {
            return $billingAddress = \Mage::getModel('Model\Cart\Address');
        }
        $this->setbillingAddress($billingAddress);
        return $this->billingAddress;
    }

    public function setShippingAddress(\Model\Cart\Address $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function getShippingAddress()
    {
        if(!$this->cart_id) {
            return false;   
        }
        $query = "SELECT * FROM `cartAddress` WHERE `cart_id` = '{$this->cart_id}' AND `addressType` = 'shipping' ";
        $shippingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);
        if(!$shippingAddress) {
            return $billingAddress = \Mage::getModel('Model\Cart\Address');
        }
        $this->setShippingAddress($shippingAddress);
        return $this->shippingAddress;
    }

    public function addItemToCart($product, $quantity = 1, $addMode = false)
    {
        if(!$this->cart_id) {
            return false;
        }
        $query = "SELECT * FROM `cartItem` WHERE `cart_id` = '{$this->cart_id}' AND `product_id` = '{$product->product_id}' ";
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItem = $cartItem->fetchRow($query);
        if($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
            return true;
        }
        
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItem->cart_id = $this->cart_id;
        $cartItem->product_id = $product->product_id;
        $cartItem->quantity = $quantity;
        $cartItem->basePrice = $product->price;
        $cartItem->price = $product->price;
        $cartItem->discount = $product->discount;
        $cartItem->createdDate = date('Y-m-d H:i:s');
        $cartItem->save();
        return true;
    }


    
}

