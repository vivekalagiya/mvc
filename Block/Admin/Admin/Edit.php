<?php

namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block_Core_Template');


class Edit extends \Block\Core\Template  
{

    public $admin = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Admin/edit.php');
    }

    public function setAdmin($admin = Null) {
        if(!$admin) {
            $id = $this->getRequest()->getGet('id');
            $admin = \Mage::getModel('Model_Admin');
            $admin = $admin->load($id);
        }
        $this->admin = $admin;
        return $this;
    }

    public function getAdmin() {
        if(!$this->admin) {
            $this->setAdmin();
        }
        return $this->admin;
    }

}
