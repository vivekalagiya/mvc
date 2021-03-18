<?php 

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class Form extends \Block\Core\Template
{
    public $product = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/form.php');
    }  
        
    public function setProduct($product = Null) {
        if(!$product) {
            $product = \Mage::getModel('Model_Product');
            $product_id = (int) $this->getRequest()->getGet('id');
            if($product_id){
                $product = $product->load($product_id);
            }
        }
        $this->product = $product;
        return $this;
    }

    public function getProduct() {
        if(!$this->product) {
            $this->setProduct();
        }
        return $this->product;

    }
}




?>