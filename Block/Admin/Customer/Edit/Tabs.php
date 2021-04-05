<?php

namespace Block\Admin\Customer\Edit;



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
        $this->addTab('customerInformation', ['label' => 'Customer Information', 'url' => $this->getUrl()->getUrl('Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'customerInformation']), 'block' => \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\Form')]);
        $this->addTab('customerAddresses', ['label' => 'Addresses ', 'url' => $this->getUrl()->getUrl('Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'customerAddresses']), 'block' => \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\Addresses')]);
        $this->addTab('attributes', ['label' => 'Attributes ', 'url' => $this->getUrl()->getUrl('Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']), 'block' => \Mage::getBlock('Block\Admin\Customer\Edit\Tabs\Attributes')]);
        $this->setDefaultTab('customerInformation');
        return $this;
    }


}
