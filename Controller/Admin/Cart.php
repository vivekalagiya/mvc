<?php 

namespace Controller\Admin;

class Cart extends \Controller\core\Admin 
{

    public function indexAction()
    {
        $layout = $this->getlayout();
        $layout->setTemplate('View/core/layout/one_column.php');
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        $cart = $this->getCart();
        $grid->setCart($cart);
        $content = $layout->getContent()->addChild($grid);
        $this->renderlayout();
        
    }

    public function addToCartAction()
    {
        try {
            $cart = $this->getCart();
            $product_id = $this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model\Product')->load($product_id);
            if(!$product) {
                throw new \Exception("product not found");
            }
            $addItem = $cart->addItemTocart($product);
            if(!$addItem) {
                throw new \Exception("Unable to add item.");
            }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect(null, 'index');
    }
    
    protected function getCart($customer_id = Null) {
        $session = \Mage::getModel('Model\Admin\Session');
        if($customer_id) {
            $session->customer_id = $customer_id;
        }
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM `{$cart->getTableName()}` WHERE `customer_id` = '{$session->customer_id}' ";
        $cart = $cart->fetchRow($query);
        if(!$session->customer_id) {
            $cart = \Mage::getModel('Model\Cart');
            $this->getMessage()->setFailure('Please Select Customer');
            return $cart;
        }
        if(!$cart) {
            $cart = \Mage::getModel('Model\Cart');
            $cart->customer_id = $session->customer_id;
            $cart->createdDate = date('Y-m-d H:i:s');
            $cart->save();
        }
        return $cart; 
    }

    public function updateAction()
    {
        $cart = $this->getCart();
        $itemQuantity = $this->getRequest()->getPost('quantity');
        foreach ($itemQuantity as $item_id => $quantity) {
            $cartItem = \Mage::getModel('Model\Cart\Item')->load($item_id);
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }
        $this->getMessage()->setSuccess('Item update Successfully.');
        $this->redirect('cart', 'index');
    }

    public function deleteAction()
    {
        $cartItem_id = $this->getRequest()->getGet('id');
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItem->delete($cartItem_id);
        $this->getMessage()->setSuccess('Item delete Successfully.');
        $this->redirect('cart', 'index');
    }

    public function selectCustomerAction()
    {
        $customer_id = $this->getRequest()->getPost('customer_id');
        $cart = $this->getCart($customer_id);
        $this->redirect('', 'index');
    }

}




?>