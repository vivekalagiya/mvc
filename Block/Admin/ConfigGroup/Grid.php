<?php

namespace Block\Admin\ConfigGroup;


class Grid extends \Block\Core\Template   
{

    public $configGroup = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/ConfigGroup/grid.php');
    }


    public function setConfigGroup($configGroup = Null) {
        if(!$configGroup) {
            $configGroup = \Mage::getModel('Model\ConfigGroup');
            $configGroup = $configGroup->fetchAll();
        }
        $this->configGroup = $configGroup;
        return $this;
    }

    public function getConfigGroup() {
        if(!$this->configGroup) {
            $this->setConfigGroup();
        }
        return $this->configGroup;
    }
}
