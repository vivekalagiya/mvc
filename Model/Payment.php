<?php 

namespace Model;



class Payment extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('payments');
        $this->setPrimaryKey('payment_id');

    }
}



?>