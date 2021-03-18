<?php

namespace Block\Admin\Product\Edit;

\Mage::loadFileByClassName('Block_Core_Template');

class Tabs extends \Block\Core\Template
{
    protected $defaultTab = Null;
    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/tabs.php');
        $this->prepareTab();
    }
    
    public function prepareTab()    
    {
        $this->addTab('productInformation', ['label' => 'Product Information', 'url' => $this->getUrl()->getUrl('Admin_product','add', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'productInformation']), 'block' => \Mage::getBlock('Block_Admin_Product_Edit_Tabs_Form')]);
        $this->addTab('productMedia', ['label' => 'Media ', 'url' => $this->getUrl()->getUrl('Admin_product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'productMedia']), 'block' => \Mage::getBlock('Block_Admin_Product_Edit_Tabs_Media')]);
        $this->addTab('groupPrice', ['label' => 'Group Price ', 'url' => $this->getUrl()->getUrl('Admin_product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'groupPrice']), 'block' => \Mage::getBlock('Block_Admin_Product_Edit_Tabs_groupPrice')]);
        $this->setDefaultTab('productInformation');
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
