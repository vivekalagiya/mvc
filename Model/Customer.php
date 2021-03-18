<?php 

namespace Model;

\Mage::loadFileByClassName('Model_Core_Table');


class Customer extends \Model\Core\Table{

    public function __construct() {

        $this->setTableName('customers');
        $this->setPrimaryKey('customer_id');

    }

}



?>