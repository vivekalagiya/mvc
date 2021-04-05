<?php

namespace Controller\Admin\Category;







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
      $model = \Mage::getModel('Model\category')->load($category_id);
      $model->setData($postData);
      $model->save();
      $this->redirect('Category','edit', ['id' => $this->getRequest()->getGet('id'), 'tab' => 'attributes']);
    }

}

?>