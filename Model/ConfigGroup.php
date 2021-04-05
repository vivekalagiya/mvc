<?php 

namespace Model;


class ConfigGroup extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('configGroup');
        $this->setPrimaryKey('group_id');

    }

    public function getConfigs()
    {
        $query = "SELECT * FROM `config` WHERE `group_id` = $this->group_id ";
        return  $this->fetchAll($query);
    }
    
}
    


?>