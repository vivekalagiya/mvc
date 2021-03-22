<?php

namespace Controller\Admin\Category;

\Mage::loadFiLeByClassName('Model_Core_Adapter');
\Mage::loadFiLeByClassName('Model_Core_Message');
\Mage::loadFiLeByClassName('Controller_Core_Admin');
\Mage::loadFiLeByClassName('Block_Core_Template');


class Attributes extends \Controller\Core\Admin{

    public function saveAction()
    {
      $category_id = $this->getRequest()->getGet('id');
      $postData = $this->getRequest()->getPost();
      foreach ($postData as $attribute => &$option) {
        if(is_array($option)) {
          $option = implode(', ', $option);
        }
      }
      $model = \Mage::getModel('Model_Category')->load($category_id);
      $model->setData($postData);
      $model->save();
      $this->redirect('Admin_Category','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']);
    }

}

?>