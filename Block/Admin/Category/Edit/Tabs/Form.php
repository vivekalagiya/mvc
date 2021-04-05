<?php 

namespace Block\Admin\Category\Edit\Tabs;


class Form extends \Block\Admin\Category\Edit 
{
    public $category = Null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Category/Edit/Tabs/form.php');
    }  
        
}




?>