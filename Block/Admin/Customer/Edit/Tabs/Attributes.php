<?php 

namespace Block\Admin\Customer\Edit\Tabs;



class Attributes extends \Block\Admin\Customer\Edit
{
    protected $attributes = [];

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/Edit/Tabs/attributes.php');
    }

    public function setAttributes($attributes = [])
    {
        if(!$attributes) {
            $query = "SELECT * FROM `attribute` WHERE `attribute`.`entityType_id` = 'customers' ";
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

}




?>