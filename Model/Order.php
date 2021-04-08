<?php 

namespace Model;

class Order extends \Model\Core\Table {

    protected $items = Null;

    public function __construct() {

        $this->setTableName('order');
        $this->setPrimaryKey('order_id');

    }

    public function setItems(\Model\Order\Item\Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    public function getItems()
    {
        if(!$this->order_id) {
            return false;   
        }
        $query = "SELECT * FROM `orderItem` WHERE order_id = '{$this->order_id}' ";
        $items = \Mage::getModel('Model\Order\Item')->fetchAll($query);
        if(!$items) {
            return null;
        }
        $this->setItems($items);
        return $this->items;
    }

    public function addItemToOrder($items)
    {
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
                $orderItem->save();
            }
        }
    }

    public function setOrderBillingAddress($address)
    {
        $orderAddress = \Mage::getModel('Model\Order\Address');
        $orderAddress->order_id = $this->order_id;
        $orderAddress->addressType = $address->addressType;
        $orderAddress->address = $address->address;
        $orderAddress->city = $address->city;
        $orderAddress->state = $address->state;
        $orderAddress->country = $address->country;
        $orderAddress->zipCode = $address->zipCode;
        $orderAddress->sameAsBilling = $address->sameAsBilling;
        $orderAddress->save();

    }
    
    public function setOrderShippingAddress($address)
    {
        $orderAddress = \Mage::getModel('Model\Order\Address');
        $orderAddress->order_id = $this->order_id;
        $orderAddress->addressType = $address->addressType;
        $orderAddress->address = $address->address;
        $orderAddress->city = $address->city;
        $orderAddress->state = $address->state;
        $orderAddress->country = $address->country;
        $orderAddress->zipCode = $address->zipCode;
        $orderAddress->sameAsBilling = $address->sameAsBilling;
        $orderAddress->save();

    }


}



?>