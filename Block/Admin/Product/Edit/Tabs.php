<?php

namespace Block\Admin\Product\Edit;


class Tabs extends \Block\Core\Edit\Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->prepareTab();
    }
    
    public function prepareTab()    
    {
        $this->addTab('productInformation', ['label' => 'Product Information', 'url' => $this->getUrl()->getUrl('Product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'productInformation']), 'block' => \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Form')]);
        $this->addTab('productMedia', ['label' => 'Media ', 'url' => $this->getUrl()->getUrl('Product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'productMedia']), 'block' => \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media')]);
        $this->addTab('groupPrice', ['label' => 'Group Price ', 'url' => $this->getUrl()->getUrl('Product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'groupPrice']), 'block' => \Mage::getBlock('Block\Admin\Product\Edit\Tabs\groupPrice')]);
        $this->addTab('attributes', ['label' => 'Attributes ', 'url' => $this->getUrl()->getUrl('Product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']), 'block' => \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Attributes')]);
        $this->setDefaultTab('productInformation');
        return $this;
    }           
    
}
