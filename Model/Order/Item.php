<?php


namespace Model\Order;

class Item extends \Model\Core\Table 
{
    protected $order = Null;
    protected $product = Null;

    public function __construct()
    {
        $this->setTableName('orderItem');
        $this->setPrimaryKey('orderItem_id');
    }

    public function setOrder(\Model\Order $order)
    {
        $this->order = $order;
        return $this;
    }

    public function getOrder()
    {
        if(!$this->order_id) {
            return false;
        }

        $order = \Mage::getModel('\Model\Order')->load($this->order_id);
        $this->setOrder($order);
        return $this->order;
    }

    // public function setProduct(\Model\product $product)
    // {
    //     $this->product = $product;
    //     return $this;
    // }

    // public function getProduct()
    // {
    //     if(!$this->product_id) {
    //         return false;
    //     }

    //     $product = \Mage::getModel('\Model\product')->load($this->product_id);
    //     $this->setProduct($product);
    //     return $this->product;
    // }

}

