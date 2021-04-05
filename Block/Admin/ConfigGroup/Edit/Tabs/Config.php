<?php 

namespace Block\Admin\ConfigGroup\Edit\Tabs;


class Config extends \Block\Admin\ConfigGroup\Edit
{
    protected $configGroup = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/ConfigGroup/Edit/Tabs/config.php');
    }

}

?>