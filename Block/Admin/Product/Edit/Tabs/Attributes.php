<?php 

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class Attributes extends \Block\Core\Template
{
    protected $attributes = [];

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/attributes.php');
    }

    public function setAttributes($attributes = [])
    {
        if(!$attributes) {
            $query = "SELECT * FROM `attribute` WHERE `attribute`.`entityType_id` = 'products' ";
            $attributes = \Mage::getModel('Model_Attribute')->fetchAll($query);
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

}




?>