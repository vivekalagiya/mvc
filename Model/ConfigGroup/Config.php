<?php

namespace Model\ConfigGroup;



class Config extends \Model\Core\Table 
{
    public function __construct()
    {
        $this->setTableName('config');
        $this->setPrimaryKey('config_id');
    }

    public function getConfigs()
    {
        $query = "SELECT * FROM `config` WHERE `group_id` = $this->group_id ";
        return  $this->fetchAll($query);
    }
}



?>