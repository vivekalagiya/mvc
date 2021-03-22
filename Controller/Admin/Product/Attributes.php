<?php

namespace Controller\Admin\Product;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


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
      $model = \Mage::getModel('Model_Product')->load($product_id);
      $model->setData($postData);
      $model->save();
      $this->redirect('Admin_product','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']);
    }

}

?>