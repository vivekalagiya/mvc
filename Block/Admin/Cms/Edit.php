<?php

namespace Block\Admin\Cms;



class Edit extends \Block\Core\Template 
{

    public $cms = Null;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Cms/edit.php');
    }

    public function setCms($cms = Null) {
        if(!$cms) {
            $cms = \Mage::getModel('Model\Cms');
            if($id = $cms->getGet('id')) {
                $cms->load($id);
            }
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
