<?php

namespace Block\Admin\cms;


class Grid extends \Block\Core\Template 
{

    public $cms = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Cms/grid.php');
    }


    public function setCms($cms = Null) {
        if(!$cms) {
            $cms = \Mage::getModel('Model\Cms');
            $cms = $cms->fetchAll();
        }
        $this->cms = $cms;
        return $this;
    }

    public function getCms() {
        if(!$this->cms) {
            $this->setCms();
        }
        return $this->cms;

    }
}
