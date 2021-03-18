<?php 

namespace Model\Product;

\Mage::loadFileByClassName('Model_Core_Table');

class groupPrice extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('productGroupPrice');
        $this->setPrimaryKey('entity_id');

    }
}


?>