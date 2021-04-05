<?php 

namespace Model;

class Product extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('products');
        $this->setPrimaryKey('product_id');

    }
}


?>