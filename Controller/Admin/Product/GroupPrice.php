<?php

namespace Controller\Admin\Product;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


class GroupPrice extends \Controller\Core\Admin{

    public function addAction() {
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');

        $content = $layout->getContent();
        $productEdit = \Mage::getBlock('Block_Admin_Product_Edit_Tabs_GroupPrice');
        $content->addChild($productEdit, 'productEdit');

        $leftBar = $layout->getChild('leftBar');
        $tab = \Mage::getBlock('Block_Admin_Product_Edit_Tabs');
        $leftBar->addChild($tab, 'tab');

        $this->renderLayout();
            
    }

    public function saveAction()
    {
        $product_id = $this->getRequest()->getGet('id');
        $groupPrice = $this->getRequest()->getPost('groupPrice');
        $existGroupPrice = $groupPrice['exist'];
        $newGroupPrice = $groupPrice['new'];
        foreach ($existGroupPrice as $group_id => $groupPrice) {
            $model = \Mage::getModel('Model_Product_GroupPrice');
            $query = "SELECT * FROM `productGroupPrice` 
            WHERE `product_id` = '{$product_id}' 
                AND `group_id` = '{$group_id}' ";
            $model = $model->fetchRow($query);
            $model->price = $groupPrice;
            $model->save();
        }
        
        foreach ($newGroupPrice as $group_id => $groupPrice) {
            $model = \Mage::getModel('Model_Product_GroupPrice');
            echo '<pre>';
            print_r($model);
            $model->price = $groupPrice;
            $model->group_id = $group_id;
            $model->product_id = $product_id;
            print_r($model);
            $model->save();
        }
        $this->redirect('','add',['id' => $product_id, 'tab' => 'groupPrice']);
    }

}

?>