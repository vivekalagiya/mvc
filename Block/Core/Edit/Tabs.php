<?php 

namespace Block\Core\Edit;

class Tabs extends \Block\Core\Template 
{
    protected $tableRow = Null;
    protected $defaultTab = Null;

    public function __construct()
    {
        $this->setTemplate('View/core/edit/tabs.php');
        $this->prepareTab();
    }
    
    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }

    public function prepareTab()
    {
        return $this;
    }

    public function setDefaultTab($defaultTab)  
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }

    public function getDefaultTab()  
    {
        return $this->defaultTab;
    }

}


?>