<?php 

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class Media extends \Block\Core\Template
{
    protected $image = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/media.php');
    }

    public function setImage($image = null)     
    {
        if(!$image) {
            $id = $this->getRequest()->getGet('id');
            $image = \Mage::getModel('Model_Product_ProductMedia');
            $image = $image->loadImage($id);
            // $query = "SELECT * FROM `{$image->getTableName()}` WHERE `product_id` = '{$id}' ";
            // $data = $image->fetchAll($query);
            // if(!$data) {
            //     return $this;
            // }
            // $image->setData($data);
        }
        $this->image = $image;
        return $this;
    }

    public function getImage()
    {
        if(!$this->image) {
            $this->setImage();
        }
        return $this->image;
    }


}




?>