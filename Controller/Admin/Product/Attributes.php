<?php

namespace Controller\Admin\Product;

class Attributes extends \Controller\Core\Admin{

    public function saveAction()
    {
      $product_id = $this->getRequest()->getGet('id');
      $postData = $this->getRequest()->getPost();
      foreach ($postData as $attribute => &$option) {
        if(is_array($option)) {
          $option = implode(', ', $option);
        }
      }
      $model = \Mage::getModel('Model\Product')->load($product_id);
      $model->setData($postData);
      $model->save();
      $this->redirect('Product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']);
    }

}

?>