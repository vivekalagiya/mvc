<?php 

namespace Model\Customer;



class Customeraddresses extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('customerAddresses');
        $this->setPrimaryKey('address_id');

    }

}


?>