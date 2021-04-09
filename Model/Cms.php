<?php 

namespace Model;

class Cms extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('cms_page');
        $this->setPrimaryKey('page_id');
    }

}



?>