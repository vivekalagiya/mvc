<?php 

namespace Model\Customer;

\Mage::loadFileByClassName('Model_Core_Table');

class Customeraddresses extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('customerAddresses');
        $this->setPrimaryKey('address_id');

    }

}


?>