<?php

namespace Block\Admin\Category;

\Mage::loadFileByClassName('Model_Admin_Message');
\Mage::loadFileByClassName('Model_category');
\Mage::loadFileByClassName('Block_Core_Template');
\Mage::loadFileByClassName('Model_Core_Request');


class Edit extends \Block\Core\Template 
{

    protected $category = Null;
    protected $categoryOptions = [];

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Category/edit.php');
    }

   
    public function setCategory($category = Null) {
        if(!$category) {
            $category = \Mage::getModel('Model_Category');
            if($id = $category->getGet('id')) {
                $category = $category->load($id);
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

    public function setCategoryOptions($categoryPathId = Null) {
        try {
            $categoryPathId = $categoryPathId.'=';
            $query = "SELECT `category_id`,`categoryName` FROM `category` ";
            $options = $this->getCategory()->getAdapter()->fetchPairs($query);
            
            $query = "SELECT `category_id`,`path_id` FROM `category`  WHERE `path_id` NOT LIKE '{$categoryPathId}%'";
            $categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);
            
            if($categoryOptions) {
                foreach ($categoryOptions as $category_id => &$path_id) {
                    $pathIds = explode('=', $path_id);
                    foreach ($pathIds as $key => &$id) {
                        if(array_key_exists($id, $options)) {
                            $id = $options[$id];
                        }
                    }
                    $path_id = implode('=>', $pathIds);
                }
            }
            $this->categoryOptions = $categoryOptions;
        } catch(\Exception $e) {
            $e->getMessage();
        }

    }

    public function getCategoryOptions($categoryPathId) {
        if(!$this->categoryOptions) {
            $this->setCategoryOptions($categoryPathId);
        }
        return $this->categoryOptions;
    }

}
