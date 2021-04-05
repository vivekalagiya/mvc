<?php

namespace Model\Attribute;

class Option extends \Model\Core\Table 
{
    public function __construct()
    {
        $this->setTableName('attributeOption');
        $this->setPrimaryKey('option_id');
    }
}



?>