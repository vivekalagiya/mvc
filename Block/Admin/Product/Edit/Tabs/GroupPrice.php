<?php 

namespace Block\Admin\Product\Edit\Tabs;


class GroupPrice extends \Block\Admin\Product\Edit
{
    protected $customerGroup = null;
    // protected $product = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/groupPrice.php');
    }

    public function setCustomerGroup($customerGroup = null)     
    {
        $price = $this->getTableRow()->price;
        if(!$customerGroup) {
            $id = $this->getRequest()->getGet('id');
            $query = "SELECT cg.*, pgp.product_id, pgp.entity_id,pgp.price as groupPrice,
            if(p.price IS NULL, '{$price}', p.price) as price
            FROM customerGroup cg
            LEFT JOIN productGroupPrice pgp
                ON pgp.group_id = cg.group_id 
                    AND pgp.product_id = $id 
            LEFT JOIN products p
                ON pgp.product_id = p.product_id ";

            $customerGroup = \Mage::getModel('Model\Customer\CustomerGroup');
            $customerGroup = $customerGroup->fetchAll($query);
        }
        $this->customerGroup = $customerGroup;
        return $this;
    }

    public function getCustomerGroup()
    {
        if(!$this->customerGroup) {
            $this->setCustomerGroup();
        }
        return $this->customerGroup;
    }

}

?>