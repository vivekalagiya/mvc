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
        
        $newOption = $postData['new']; 
        $name = $newOption['name'];
        $sortOrder = $newOption['sortOrder'];
        $newOption = array_combine($name, $sortOrder);
        
        foreach ($newOption as $name => $sortOrder) {
            $query = "INSERT INTO `attributeoption` ( `name`, `attribute_id`, `sortOrder`) VALUES 
            ('{$name}', '{$attribute_id}', '{$sortOrder}') ";
            $option = \Mage::getModel('Model_Attribute_Option')->insert($query);
        }
        
        foreach ($existOption as $option_id => $value) {
            $name = $value['name'];
            $sortOrder = $value['sortOrder']; 
            $query = "UPDATE `attributeOption` 
                SET `name`='{$name}', `sortOrder`='{$sortOrder}'
                WHERE `option_id` = '{$option_id}' AND `attribute_id`='{$attribute_id}' ";   
            $option = \Mage::getModel('Model_Attribute_Option')->update($query);
        }
        $this->redirect('Admin_Attribute','Option',['id' => $attribute_id]);
    }
    
    public function deleteAction()
    {
        $attribute_id = $this->getRequest()->getGet('attribute_id');
        $option_id = $this->getRequest()->getGet('option_id');
        $option = \Mage::getModel('Model_Attribute_Option')->delete($option_id);
        $this->redirect('Admin_Attribute','Option',['id' => $attribute_id]);
        
    }   
}


?>