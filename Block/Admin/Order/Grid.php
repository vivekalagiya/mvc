<?php

namespace Block\Admin\Order;




class Grid extends \Block\Core\Template 
{

    public $order = NULL;

    
    public function __construct()
    {
        $this->setTemplate('View/Admin/Order/grid.php');
    }

    public function setOrder(\Model\Order $order) {

        $this->order = $order;
        return $this;
    }

    public function getOrder() {
        try {
            if(!$this->order) {
                throw new \Exception("order not found");
            }
            return $this->order;
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
}
