<?php 

namespace Model\Customer;

class CustomerGroup extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('customerGroup');
        $this->setPrimaryKey('group_id');

    }

}


?>