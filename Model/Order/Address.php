<?php


namespace Model\Order;

class Address extends \Model\Core\Table 
{
    protected $order = Null;
    
    public function __construct()
    {
        $this->setTableName('orderAddress');
        $this->setPrimaryKey('orderAddress_id');
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

        $order = \Mage::getModel('Model\Order')->load($this->order_id);
        $this->setOrder($order);
        return $this->order;
    }


}

