<?php 

namespace Block\Admin\Product\Edit\Tabs;



class Attributes extends \Block\Admin\Product\Edit
{
    protected $attributes = [];

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/attributes.php');
    }

    public function setAttributes($attributes = [])
    {
        if(!$attributes) {
            $query = "SELECT * FROM `attribute` WHERE `entityType_id` = 'products' ";
            $attributes = \Mage::getModel('Model\Attribute')->fetchAll($query);
        }
        $this->attributes = $attributes;
        return $this;
    }
    
    public function getAttributes()
    {
        if(!$this->attributes) {
            $this->setAttributes();
        }
        return $this->attributes;
    }
    
    public function getValue($attributeName)
    {
        $product_id = $this->getRequest()->getGet('id');
        $query = "SELECT `{$attributeName}` FROM `products` WHERE `products`.`product_id` = '{$product_id}' ";
        return \Mage::getModel('Model\Product')->fetchRow($query)->$attributeName;
    }


}




?>