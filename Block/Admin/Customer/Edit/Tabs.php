<?php

namespace Block\Admin\Customer\Edit;

\Mage::loadFileByClassName('Block_Core_Template');

class Tabs extends \Block\Core\Template
{
    protected $defaultTab = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/edit/tabs.php');
        $this->prepareTab();
    }

    public function prepareTab()    
    {
        $this->addTab('customerInformation', ['label' => 'Customer Information', 'url' => $this->getUrl()->getUrl('Admin_Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'customerInformation']), 'block' => \Mage::getBlock('Block_Admin_Customer_Edit_Tabs_Form')]);
        $this->addTab('customerAddresses', ['label' => 'Addresses ', 'url' => $this->getUrl()->getUrl('Admin_Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'customerAddresses']), 'block' => \Mage::getBlock('Block_Admin_Customer_Edit_Tabs_Addresses')]);
        $this->addTab('attributes', ['label' => 'Attributes ', 'url' => $this->getUrl()->getUrl('Admin_Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']), 'block' => \Mage::getBlock('Block_Admin_Customer_Edit_Tabs_Attributes')]);
        $this->setDefaultTab('customerInformation');
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
