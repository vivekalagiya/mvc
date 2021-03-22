<?php 

namespace Block\Admin\Attribute\Option;
\Mage::loadFileByClassName('Block_Core_Template');

class Grid extends \Block\Core\Template 
{
    protected $attribute = [];

    public function __construct()
    {
        $this->setTemplate('View/Admin/Attribute/Option/grid.php');
    }

    public function setAttribute($attribute = Null)
    {
        if(!$attribute) {
            $attribute = \Mage::getModel('Model_Attribute_Option')->fetchAll();
        }
        $this->attribute = $attribute;
        return $this;
    }
    
    public function getAttribute() 
    {
        if(!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }

}



?>