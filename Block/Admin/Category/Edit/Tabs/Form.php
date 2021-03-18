<?php 

namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class Form extends \Block\Core\Template  
{
    public $category = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Category/Edit/Tabs/form.php');
    }  
        
    public function setCategory($category = Null) {
        if(!$category) {
            $category = \Mage::getModel('Model_Category');
            $category_id = (int) $this->getUrl()->getRequest()->getGet('id');
            if($category_id){
                $category = $category->load($category_id);
            }
        }
        $this->category = $category;
        return $this;
    }

    public function getCategory() {
        if(!$this->category) {
            $this->setCategory();
        }
        return $this->category;

    }
}




?>