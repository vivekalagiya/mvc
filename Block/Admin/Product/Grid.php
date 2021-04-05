<?php

namespace Block\Admin\Product;





class Grid extends \Block\Core\Template  
{

    public $products = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/grid.php');
    }

    public function setProducts($products = Null) {
        if(!$products) {
            $products = \Mage::getModel('Model\Product');
            $products = $products->fetchAll();
        }
        $this->products = $products;
        return $this;
    }

    public function getProducts() {
        if(!$this->products) {
            $this->setProducts();
        }
        return $this->products;

    }

    
}
