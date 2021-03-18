<?php

namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Controller_Core_Admin');
\Mage::loadFileByClassName('Model_Admin_Message');
\Mage::loadFileByClassName('Model_Customer');
\Mage::loadFileByClassName('Block_Core_Template');


class Edit extends \Block\Core\Template 
{

    public $customer = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Customer/edit.php');
    }

    public function setCustomer($customer = Null) {
        if(!$customer) {
            $customer = \Mage::getModel('Model_Customer');
            if($id = $customer->getGet('id')) {
                $customer->load($id);
            }
        }
        $this->customer = $customer;
        return $this;

    }

    public function getCustomer() {
        if(!$this->customer) {
            $this->setCustomer();
        }
        return $this->customer;
    }

    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('Block_Admin_Customer_Edit_Tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        if(!array_key_exists($tab, $tabs)) {
            return Null;
        }
        $block = $tabs[$tab]['block'];
        echo $block->toHtml();
    }
}
