<?php

namespace Controller\Admin\Customer;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


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
      $model = \Mage::getModel('Model_Customer')->load($customer_id);
      $model->setData($postData);
      $model->save();
      $this->redirect('Admin_Customer','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']);
    }

}

?>