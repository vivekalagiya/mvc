<?php

namespace Block\Admin\Admin;


class Grid extends \Block\Core\Template  
{

    public $admin = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Admin/grid.php');
    }


    public function setAdmin($admin = Null) {
        if(!$admin) {
            $admin = \Mage::getModel('Model\Admin');
            $admin = $admin->fetchAll();
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
