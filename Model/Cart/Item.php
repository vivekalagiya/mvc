<?php


namespace Model\Cart;

class Item extends \Model\Core\Table 
{
    protected $cart = Null;
    protected $product = Null;

    public function __construct()
    {
        $this->setTableName('cartItem');
        $this->setPrimaryKey('cartItem_id');
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

    public function setProduct(\Model\product $product)
    {
        $this->product = $product;
        return $this;
    }

    public function getProduct()
    {
        if(!$this->product_id) {
            return false;
        }
        $product = \Mage::getModel('\Model\product')->load($this->product_id);
        $this->setProduct($product);
        return $this->product;
    }

}

