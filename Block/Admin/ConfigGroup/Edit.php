<?php

namespace Block\Admin\ConfigGroup;


class Edit extends \Block\Core\Edit   
{

    protected $configGroup = Null;

    public function __construct()
    {
        parent::__construct();  
        $this->setTabClass('Block\Admin\ConfigGroup\Edit\Tabs');
    }

}
