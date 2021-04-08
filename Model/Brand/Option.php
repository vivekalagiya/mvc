<?php
namespace Model\Brand;

class Option extends \Model\Attribute\Option
{
    public function __construct()
    {
        $this->setTableName('attributeOption');
        $this->setPrimaryKey('option_id');
    }

    public function getOptions()
    {
        $query = "SELECT 
            brand_id AS option_id,  
            brandName AS name,
            '{$this->getAttribute()->attribute_id}' AS attribute_id,
            sortOrder
        FROM `brand`
        ORDER BY `sortOrder` ASC ";

        $options = \Mage::getModel('Model\Brand')->fetchAll($query);
        if(!$options) {
            return Null;
        }
        return $options;
    }
}

?>