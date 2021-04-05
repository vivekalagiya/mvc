<?php 

namespace Model\Product;

class ProductMedia extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('productMedia');
        $this->setPrimaryKey('image_id');
    }

    public function loadImage($id = Null)
    {
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `product_id` = '{$id}' ";
        $images = $this->fetchAll($query);
        if(!$images) {
            return $this;
        }
        $images = $images->getData();
        $this->setData($images);
        return $this;
    }

    public function getImagePath($subPath = Null)
    {
        return \Mage::getBaseDir($subPath);
    }
}


?>