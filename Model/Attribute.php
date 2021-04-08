<?php 

namespace Model;


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

        $options = \Mage::getModel($this->backendModel)->setAttribute($this)->getOptions();
        if(!$options) {
            return Null;
        }
        return $options;
    }
    
}
    


?>