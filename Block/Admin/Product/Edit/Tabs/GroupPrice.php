<?php 

namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block_Core_Template');

class GroupPrice extends \Block\Core\Template
{
    protected $customerGroup = null;
    protected $product = null;

    public function __construct()
    {
        $this->setTemplate('View/Admin/Product/Edit/Tabs/groupPrice.php');
    }

    public function setProduct($product = null)     
    {
        if(!$product) {
            $id = $this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model_Product')->load($id);
        }
        $this->product = $product;
        return $this;
    }

    public function getProduct()
    {
        if(!$this->product) {
            $this->setProduct();
        }
        return $this->product;
    }

    public function setCustomerGroup($customerGroup = null)     
    {
        $price = $this->getProduct()->price;
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

            $customerGroup = \Mage::getModel('Model_Customer_CustomerGroup');
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