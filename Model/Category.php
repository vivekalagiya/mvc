<?php 

namespace Model;

\Mage::loadFileByClassName('Model_Core_Table');

class Category extends \Model\Core\Table {

    const FEATURED_TRUE = 1;
    const FEATURED_FALSE = 0;

    public function __construct() {

        $this->setTableName('category');
        $this->setPrimaryKey('category_id');

    } 
    public function getFeaturedOption()
    {
        return [
            self::FEATURED_TRUE => 'True',
            self::FEATURED_FALSE => 'False'
        ];
    }

    public function updatePathId($category)
    {
        if(!$category->parent_id) {
            $path_id = $category->category_id;
        } else {
            $parent = \Mage::getModel('Model_Category')->load($category->parent_id);
            $path_id = $parent->path_id.'='.$category->category_id;
        }
        $category->path_id = $path_id;
        $category->save();
    }

    public function updateChildrenPathId($categoryPathId, $parent_id = Null)
    {
        $categoryPathId = $categoryPathId.'=';
        $query = "SELECT * FROM `category` WHERE `path_id` LIKE '{$categoryPathId}%' ORDER BY `path_id` ASC ";
        $categories = $this->getAdapter()->fetchAll($query);
        foreach ($categories as $key => $category) {
            $category = \Mage::getModel('Model_Category')->load($category['category_id']);
            if($parent_id) {
                $category->parent_id = $parent_id;
            }
            $category->updatePathId($category);
        }
    }



}



?>