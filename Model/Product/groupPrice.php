<?php 

namespace Model\Product;



class groupPrice extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('productGroupPrice');
        $this->setPrimaryKey('entity_id');

    }
}


?>