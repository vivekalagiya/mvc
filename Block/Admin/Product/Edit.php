<?php

namespace Block\Admin\Product;

// \\Mage::loadFileByClassName('Controller_Core_Admin');
// \\Mage::loadFileByClassName('Model_Admin_Message');
// \\Mage::loadFileByClassName('Model_Product');


class Edit extends \Block\Core\Template 
{

    public $product = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/edit.php');
    }

    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Block_Admin_Product_Edit_Tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        if(!array_key_exists($tab, $tabs)) {
            return Null;
        }
        $block = $tabs[$tab]['block'];
        echo $block->toHtml();
    }
}
