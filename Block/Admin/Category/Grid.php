<?php

namespace Block\Admin\Category;

\Mage::loadFileByClassName('Controller_Core_Admin');
\Mage::loadFileByClassName('Model_Category');
\Mage::loadFileByClassName('Block_Core_Template');


class Grid extends \Block\Core\Template 
{

    public $categories = [];
    public $categoryOptions = [];

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Category/grid.php');
        $this->setCategoryOptions();
    }

    public function setCategories($categories = Null) {
        if(!$categories) {
            $categories = \Mage::getModel('Model_Category');
            $query = "SELECT * FROM `category`";
            $categories = $categories->fetchAll($query);
        }
        $this->categories = $categories;
        return $this;
    }

    public function getCategories() {
        if(!$this->categories) {
            $this->setCategories();
        }
        return $this->categories;
    }

    
    
    public function setCategoryOptions($categoryOptions = Null) {
        try {
            if($categoryOptions) {
                $this->categoryOptions = $categoryOptions;
                return $this;
            }
            
            $category = \Mage::getModel('Model_Category');
            $query = "SELECT `category_id`,`categoryName` FROM `category` ";
            $options = $category->getAdapter()->fetchPairs($query);
            
            $query = "SELECT `category_id`,`path_id` FROM `category` ";
            $categoryOptions = $category->getAdapter()->fetchPairs($query);

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
            $this->setCategoryOptions($categoryOptions);
        } catch(\Exception $e) {
            $e->getMessage();
        }

    }

    public function getCategoryOptions() {
        return $this->categoryOptions;
    }

    
}
