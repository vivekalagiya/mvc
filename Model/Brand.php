<?php 

namespace Model;



class Brand extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('brand');
        $this->setPrimaryKey('brand_id');

    }

}



?>