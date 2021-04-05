<?php

namespace Block\Admin\Customer;



class Edit extends \Block\Core\Edit 
{

    public function __construct()
    {
        parent::__construct();
        $this->setTabClass('Block\Admin\Customer\Edit\Tabs');
    }
}
