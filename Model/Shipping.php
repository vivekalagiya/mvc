<?php 

namespace Model;

\Mage::loadFileByClassName('Model_Core_Table');

class Shipping extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('shippings');
        $this->setPrimaryKey('shipping_id');

    }

}



?>