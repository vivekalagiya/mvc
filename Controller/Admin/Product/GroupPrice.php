<?php

namespace Controller\Admin\Product;







class GroupPrice extends \Controller\Core\Admin{

    public function editAction() {
        $layout = $this->getLayout();
        $layout->setTemplate('./View/core/layout/two_column_with_leftBar.php');

        $product_id = $this->getRequest()->getGet('id');
        $product = \Mage::getModel('Model\Product');
        $content = $layout->getContent();
        $productEdit = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\GroupPrice')->setTableRow($product);
        $content->addChild($productEdit, 'productEdit');

        $leftBar = $layout->getChild('leftBar');
        $tab = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
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
            $model = \Mage::getModel('Model\Product\GroupPrice');
            $query = "SELECT * FROM `productGroupPrice` 
            WHERE `product_id` = '{$product_id}' 
                AND `group_id` = '{$group_id}' ";
            $model = $model->fetchRow($query);
            $model->price = $groupPrice;
            $model->save();
        }
        
        foreach ($newGroupPrice as $group_id => $groupPrice) {
            $model = \Mage::getModel('Model\Product\GroupPrice');
            echo '<pre>';
            print_r($model);
            $model->price = $groupPrice;
            $model->group_id = $group_id;
            $model->product_id = $product_id;
            print_r($model);
            $model->save();
        }
        $this->redirect('','edit',['id' => $product_id, 'tab' => 'groupPrice']);
    }

}

?>