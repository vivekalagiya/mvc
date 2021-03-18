<?php

namespace Controller\Admin\Product;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


class ProductMedia extends \Controller\Core\Admin{

    public function addAction() {
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');

        $content = $layout->getContent();
        $productEdit = \Mage::getBlock('Block_Admin_Product_Edit_Tabs_Media');
        $content->addChild($productEdit, 'productEdit');

        $leftBar = $layout->getChild('leftBar');
        $tab = \Mage::getBlock('Block_Admin_Product_Edit_Tabs');
        $leftBar->addChild($tab, 'tab');
        
        $this->renderLayout();
            
    }

    public function saveAction()
    {
        
        $data = $this->getRequest()->getPost('image');
        
        if($data) {
            
            $productMedia = \Mage::getModel('Model_Product_ProductMedia');
            $productMedia->setData($data);
            $productMedia->product_id = $this->getRequest()->getGet('id');
            $data = $productMedia->getData();
            
            foreach ($data['data'] as $image_id => $value) {
                if($data['small'] == $image_id) {
                    $small = 1;
                } else {
                    $small = 0;
                }
                
                if($data['thumb'] == $image_id) {
                    $thumb = 1;
                } else {
                    $thumb = 0;
                }
                
                if($data['base'] == $image_id) {
                    $base = 1;
                } else {
                    $base = 0;
                }
                
                $image_id = $image_id;
                $label = $value['label'];
                if(array_key_exists('gallery', $value)) {
                    $gallery = 1;
                } else {
                    $gallery = 0;
                }
                if(array_key_exists('remove', $value)) {
                    $remove = 1;
                } else {
                    $remove = 0;
                }
                if($remove) {
                    $query = "DELETE FROM `productMedia` WHERE `productMedia`.`image_id` = $image_id";
                    $adapter = new \Model\Core\Adapter();
                    $result = $adapter->delete($query);
                    
                } else {
                    $query = "UPDATE `productMedia` SET `label` = '{$label}', `gallery` = '{$gallery}', `small` = '{$small}', `thumb` = '{$thumb}', `base` = '{$base}' WHERE `image_id` = {$image_id} ";
                    $adapter = new \Model\Core\Adapter();
                    $result = $adapter->update($query);
                }
            }
        } else {
            $this->imageUpload();
        }
        // $productMedia->save();
        $this->redirect('Admin_Product_ProductMedia', 'add', ['id' => $productMedia->product_id]);
        
    }

    public function imageUpload() {
        $productMedia = \Mage::getModel('Model_Product_ProductMedia');
        // echo '<pre>';
        // print_r($_FILES['image']);die;
        if($_FILES['image']) {
            $image = $_FILES['image']['name'];
            $tempName = $_FILES['image']['tmp_name'];
            $subPath = 'skin\Images\Product\\';
            $path = $productMedia->getImagePath($subPath);
            move_uploaded_file($tempName, $path.$image);
    
            $productMedia->image = $image;
            $productMedia->product_id = $this->getRequest()->getGet('id');
            $productMedia->save();
        }
        // $this->redirect('Admin_Product_ProductMedia', 'add', ['id' => $productMedia->product_id]);
    }
    
    public function deleteAction() {
        
    }
    
}







?>