<?php 

namespace Model;

class Order extends \Model\Core\Table {

    protected $items = Null;

    public function __construct() {

        $this->setTableName('order');
        $this->setPrimaryKey('order_id');

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

    public function addItemToOrder($cart)
    {
        $items = $cart->getItems();
        if($items) {
            foreach ($items->getData() as $key => $item) {
                
                $product = \Mage::getModel('Model\Product')->load($item->product_id);
                $orderItem = \Mage::getModel('Model\Order\Item');
                $orderItem->order_id = $this->order_id;
                $orderItem->product_id = $item->product_id;
                $orderItem->sku = $product->sku;
                $orderItem->productName = $product->productName;
                $orderItem->quantity = $item->quantity;
                $orderItem->price = $item->price;
                $orderItem->discount = $item->discount;
                // echo '<pre>';
                // print_r($items);die;
                $orderItem->save();
            }
        }
    }
}



?>