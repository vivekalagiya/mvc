<?php

namespace Model\Attribute;

class Option extends \Model\Core\Table 
{

    protected $attribute = null;

    public function __construct()
    {
        $this->setTableName('attributeOption');
        $this->setPrimaryKey('option_id');
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    public function getOptions()
    {
        $query = "SELECT * FROM `attributeOption` 
        WHERE `attribute_id` = '{$this->getAttribute()->attribute_id}'
        ORDER BY `sortOrder` ASC";

        $options = \Mage::getModel('Model\Attribute\Option')->fetchAll($query);
        if(!$options) {
            return Null;
        }
        return $options;
    }
}



?>