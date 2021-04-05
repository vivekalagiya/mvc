<?php

namespace Block\Admin\Cart;

class Checkout extends \Block\Core\Template 
{
    protected $cart = Null;
    
    public function __construct()
    {
        $this->setTemplate('View\Admin\Cart\checkout.php');
    }

    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        try {
            if(!$this->cart) {
                throw new \Exception("Cart is not set!");
            }   
            return $this->cart;
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function getBillingAddress()
    {
        $cartBillingAddress = $this->getCart()->getBillingAddress();
        if($cartBillingAddress) {
            return $cartBillingAddress;
        }

        $customerBillingAddress = $this->getCart()->getCustomer()->getCustomerBillingAddress();
        if($customerBillingAddress) {
            return $customerBillingAddress;
        }

        return \Mage::getModel('Model\Customer\customerAddresses');
    }

    public function getShippingAddress()
    {
        $cartShippingAddress = $this->getCart()->getShippingAddress();
        if($cartShippingAddress) {
            return $cartShippingAddress;
        }

        $customerShippingAddress = $this->getCart()->getCustomer()->getCustomerShippingAddress();
        if($customerShippingAddress) {
            return $customerShippingAddress;
        }

        return \Mage::getModel('Model\Customer\customerAddresses');
    }

    public function getCartTotal()
    {
        $items = $this->getCart()->getItems();
        $price = 0;
        foreach ($items->getData() as $key => $item) {
            $price += ($item->price - $item->discount) * $item->quantity;
        }
        return $price;

    }

    public function getTotalDiscount()
    {
        $items = $this->getCart()->getItems();
        $discount = 0;
        foreach ($items->getData() as $key => $item) {
            $discount += $item->discount * $item->quantity;
        }
        return $discount;
    }

    public function getShippingCharge()
    {
        return $shippingCharge = $this->getCart()->shippingAmount;
    }

    
}




?>