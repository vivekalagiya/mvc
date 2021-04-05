<?php

namespace Block\Admin\Cart;

class Grid extends \Block\Core\Template 
{
    protected $cart = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Cart/grid.php');
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        try {
            if(!$this->cart) {
                throw new \Exception("Cart is Not set");
            }
            return $this->cart;
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function getCustomers()
    {
        $customers = \Mage::getModel('Model\Customer')->fetchAll();
        return $customers;
    }

}



?>