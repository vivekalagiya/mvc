<?php 

namespace Block\Admin\Attribute;

class Option extends  \Block\Core\Template 
{

    protected $option = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Attribute/option.php');
    }

    public function setOption($option = Null)
    {
        if(!$option) {
            $option = \Mage::getModel('Model\Attribute\Option');
        }
        $this->option = $option;
        return $this;
    }

    public function getOption()
    {
        if(!$this->option) {
            $this->setOption();
        }
        return $this->option;
    }

}



?>