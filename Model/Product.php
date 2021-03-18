<?php 

namespace Model;

\Mage::loadFileByClassName('Model_Core_Table');

class Product extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('products');
        $this->setPrimaryKey('product_id');

    }
}


?>