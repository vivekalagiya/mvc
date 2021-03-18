<?php

namespace Controller\Admin\Attribute;

\Mage::loadFileByClassName('Controller_Core_Admin');

class Option extends \Controller\Core\Admin
{

    public function saveAction()
    {
        $postData = $this->getRequest()->getPost();
        $attribute_id = $this->getRequest()->getGet('id');
        $existOption = $postData['exist']; 
        $newOption = $postData; 
        echo '<pre>';
        print_r($newOption);
        foreach ($existOption as $option_id => $value) {
            $name = $value['name'];
            $sortOrder = $value['sortOrder']; 
            $query = "UPDATE `attributeOption` 
            SET`name`='{$name}',`attribute_id`='{$attribute_id}',`sortOrder`='{$sortOrder}'
             WHERE `option_id` = '{$option_id}' ";   
            $option = \Mage::getModel('Model_Attribute_Option')->update($query);
        }
        $this->redirect('Admin_Attribute','Option',['id' => $attribute_id]);
    }
}


?>