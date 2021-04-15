<?php

namespace Controller\Admin\Product;

class GroupPrice extends \Controller\Core\Admin{

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
            $model->price = $groupPrice;
            $model->group_id = $group_id;
            $model->product_id = $product_id;
            $model->save();
        }
        // $this->redirect('','edit',['id' => $product_id, 'tab' => 'groupPrice']);
    }   

}

?>