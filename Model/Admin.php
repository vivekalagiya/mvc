<?php 

namespace Model;

\Mage::loadFileByClassName('Model_Core_Table');

class Admin extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('admin');
        $this->setPrimaryKey('admin_id');

    }
    
}



?>