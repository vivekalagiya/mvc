<?php

namespace Model_Attribute;

\Mage::loadFileByClassName('Model_Core_Table');

class Option extends \Model\Core\Table 
{
    public function __construct()
    {
        $this->setTableName('attributeOption');
        $this->setPrimaryKey('option_id');
    }
}



?>