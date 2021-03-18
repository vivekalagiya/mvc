<?php 

namespace Model\Product;

\Mage::loadFileByClassName('Model_Core_Table');

class ProductMedia extends \Model\Core\Table {

    public function __construct() {

        $this->setTableName('productMedia');
        $this->setPrimaryKey('image_id');

    }

    public function loadImage($id = Null)
    {
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `product_id` = '{$id}' ";
        $data = $this->fetchAll($query);
        if(!$data) {
            return $this;
        }
        $this->setData($data);
        return $this;
    }

    public function getImagePath($subPath = Null)
    {
        return \Mage::getBaseDir($subPath);
        
    }
}


?>