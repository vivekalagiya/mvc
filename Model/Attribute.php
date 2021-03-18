<?php 

namespace Model;

\Mage::loadFileByClassName('Model_Core_Table');

class Attribute extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('attribute');
        $this->setPrimaryKey('attribute_id');

    }

    public function getBackendTypeOption()
    {
        return [
            'varchar(20)' => 'Varchar',
            'int(11)' => 'Int',
            'decimal(10.2)' => 'Decimal',
            'text(20)' => 'Text'
        ];
    }

    public function getInputTypeOption()
    {
        return [
            'text' => 'Text Box',
            'textarea' => 'Textarea',
            'select' => 'Select',
            'checkbox' => 'Checkbox',
            'radio' => 'Radio'
        ];
    }

    public function getEntityTypeOption()
    {
        return [
            'products' => 'Product',
            'category' => 'Category',
            'customers' => 'Customer'
        ];
    }

    public function getOptions()
    {
        $query = "SELECT * FROM `attributeOption` WHERE `attribute_id` = $this->attribute_id ORDER BY `sortOrder` ASC";
        return  $this->fetchAll($query);
    }
    
}



?>