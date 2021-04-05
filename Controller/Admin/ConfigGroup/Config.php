<?php

namespace Controller\Admin\ConfigGroup;



class Config extends \Controller\Core\Admin
{

    public function saveAction()
    {
        $postData = $this->getRequest()->getPost();
        $group_id = $this->getRequest()->getGet('id');
        $existConfig = $postData['exist']; 
        $newConfig = $postData['new'];

        $title = $newConfig['title'];
        $code = $newConfig['code'];
        $value = $newConfig['value'];
        $count = count($title);
        
        $newConfig = [];
        $createdDate = date('Y-m-d H:i:s');
        
        for ($i=0; $i < $count; $i++) { 
            $newConfig[$i]['title'] = $title[$i];
            $newConfig[$i]['code'] = $code[$i];
            $newConfig[$i]['value'] = $value[$i];
        }
        
        foreach ($newConfig as $key => $config) {
            $query = "INSERT INTO `config` (`group_id`, `title`, `code`, `value`, `createdDate`) VALUES 
            ('{$group_id}', '{$config['title']}', '{$config['code']}', '{$config['value']}', '{$createdDate}') ";
            $config = \Mage::getModel('Model\ConfigGroup\Config')->insert($query);
        }
        
        foreach ($existConfig as $config_id => $config) {
            $title = $config['title'];
            $code = $config['code']; 
            $value = $config['value'];
            $query = "UPDATE `config` 
            SET `title`='{$title}', `code`='{$code}', `value`='{$value}'
            WHERE `config_id` = '{$config_id}' ";
            $option = \Mage::getModel('Model\ConfigGroup\Config')->update($query);
        }
        $this->redirect('ConfigGroup','edit',['id' => $group_id, 'tab' => 'configuration']);
    }
    
    public function deleteAction()
    {
        $group_id = $this->getRequest()->getGet('group_id');
        $config_id = $this->getRequest()->getGet('config_id');
        $config = \Mage::getModel('Model\ConfigGroup\Config')->delete($config_id);
        $this->redirect('ConfigGroup','Edit',['id' => $group_id, 'tab' => 'configuration']);
        
    }   
}


?>