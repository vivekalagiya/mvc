<?php

namespace Block\Admin\ConfigGroup\Edit;


class Tabs extends \Block\Core\Edit\Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }
    
    public function prepareTab()    
    {
        $this->addTab('information', ['label' => 'information', 'url' => $this->getUrl()->getUrl('ConfigGroup','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'information']), 'block' => \Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs\Form')]);
        $this->addTab('configuration', ['label' => 'configuration ', 'url' => $this->getUrl()->getUrl('ConfigGroup','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'configuration']), 'block' => \Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs\Config')]);
        $this->setDefaultTab('information');
        return $this;
    }           
    
}
