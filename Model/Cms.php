<?php 

namespace Model;

class Cms extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('cms');
        $this->setPrimaryKey('cms_id');

    }

}



?>