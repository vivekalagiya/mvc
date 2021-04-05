<?php

namespace Block\Admin\Category\Edit;


class Tabs extends \Block\Core\Edit\Tabs 
{
    protected $defaultTab = Null;

    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }

    public function prepareTab()    
    {
        $this->addTab('categoryInformation', ['label' => 'Category Information', 'url' => $this->getUrl()->getUrl('Category','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'categoryInformation']), 'block' => \Mage::getBlock('Block\Admin\Category\Edit\Tabs\Form')]);
        $this->addTab('attributes', ['label' => 'Attributes ', 'url' => $this->getUrl()->getUrl('Category','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']), 'block' => \Mage::getBlock('Block\Admin\Category\Edit\Tabs\Attributes')]);
        $this->setDefaultTab('categoryInformation');
        return $this;
    }

}
