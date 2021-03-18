<?php 

namespace Model\Customer;

\Mage::loadFileByClassName('Model_Core_Table');

class CustomerGroup extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('customerGroup');
        $this->setPrimaryKey('group_id');

    }

}


?>