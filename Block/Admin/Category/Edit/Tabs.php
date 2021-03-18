<?php

namespace Block\Category\Edit;

\Mage::loadFileByClassName('Block_Core_Template');

class Tabs extends \Block\Core\Template  
{
    protected $defaultTab = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Category/form/tabs.php');
        $this->prepareTab();
    }

    public function prepareTab()    
    {
        $this->addTab('categoryInformation', ['label' => 'Category Information', 'url' => $this->getUrl()->getUrl('Admin_Category','add', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'categoryInformation']), 'block' => \Mage::getBlock('Block_Admin_Category_Edit_Tabs_Form')]);
        $this->setDefaultTab('categoryInformation');
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