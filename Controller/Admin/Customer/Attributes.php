<?php

namespace Controller\Admin\Customer;







class Attributes extends \Controller\Core\Admin{

    public function saveAction()
    {
      $customer_id = $this->getRequest()->getGet('id');
      $postData = $this->getRequest()->getPost();
      foreach ($postData as $attribute => &$option) {
        if(is_array($option)) {
          $option = implode(', ', $option);
        }
      }
      $model = \Mage::getModel('Model\Customer')->load($customer_id);
      $model->setData($postData);
      $model->save();
      $this->redirect('Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']);
    }

}

?>