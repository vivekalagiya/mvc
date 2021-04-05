<?php

namespace Block\Core;


class Edit extends Template 
{
    protected $tab = Null;
    protected $tableRow = Null;
    protected $tabClass = Null;

    public function __construct()
    {
        $this->setTemplate('View/core/edit.php');
    }

    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock($this->getTabClass());
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        if(!array_key_exists($tab, $tabs)) {
            return Null;
        }
        $block = $tabs[$tab]['block'];
        $block->setTableRow($this->getTableRow());
        return $block->toHtml();
    }   
    
    public function getTabHtml()
    {
        return $this->getTab()->toHtml();
    }
    
    public function setTab($tab = Null)
    {
        if(!$tab) {
            $tab = \Mage::getBlock($this->getTabClass());
        }
        $tab->setTableRow($this->getTableRow());
        $this->tab = $tab;
        return $this;
    }

    public function getTab()
    {
        if(!$this->tab) {
            $this->setTab();
        }
        return $this->tab;
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

    public function getFormUrl()
    {
        return $this->getUrl('', 'save');
    }

    public function setTabClass($tabClass)
    {
        $this->tabClass = $tabClass;
        return $this;
    }

    public function getTabClass()
    {
        return $this->tabClass;
    }
}




?>