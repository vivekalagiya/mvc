<?php

namespace Block\Admin\Category;


class Edit extends \Block\Core\Edit
{

    protected $categoryOptions = [];

    
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass('Block\Admin\Category\Edit\Tabs');
    }

    public function setCategoryOptions($categoryPathId = Null) {
        try {
            $categoryPathId = $categoryPathId.'=';
            $query = "SELECT `category_id`,`categoryName` FROM `category` ";
            $options = $this->getTableRow()->getAdapter()->fetchPairs($query);
            
            $query = "SELECT `category_id`,`path_id` FROM `category`  WHERE `path_id` NOT LIKE '{$categoryPathId}%'";
            $categoryOptions = $this->getTableRow()->getAdapter()->fetchPairs($query);
            
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
