<?php 

namespace Controller\Admin;

class Cart extends \Controller\core\Admin 
{

    public function indexAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        $cart = $this->getCart();
        $grid->setCart($cart);
        $cartGrid = $grid->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $cartGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        // $layout = $this->getlayout();
        // $layout->setTemplate('View/core/layout/one_column.php');
        // $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        // $cart = $this->getCart();
        // $grid->setCart($cart);
        // $content = $layout->getContent()->addChild($grid);
        // $this->renderlayout();
        
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

        
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid');
        $cart = $this->getCart();
        $grid->setCart($cart);
        $cartGrid = $grid->toHtml();
        
        $response = [
            'status' => 'success',
            'message' => 'i can do',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $cartGrid
            ]
        ];
        
        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);


        // $this->redirect(null, 'index');
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
        try {
            $cart = $this->getCart();
            $itemQuantity = $this->getRequest()->getPost('quantity');
            foreach ($itemQuantity as $item_id => $quantity) {
                if($quantity == 0) {
                    $cartItem = \Mage::getModel('Model\Cart\Item')->load($item_id);
                    $cartItem->delete($item_id);
                } elseif ($quantity < 0 ) {
                    throw new \Exception("Quantity can not be negative!", 1);
                } else {
                    $cartItem = \Mage::getModel('Model\Cart\Item')->load($item_id);
                    $product = $cartItem->getProduct();
                    $cartItem->quantity = $quantity;
                    $cartItem->baseprice = $product->price * $quantity;
                    $cartItem->price = $product->price * $quantity;
                    $cartItem->discount = $product->discount * $quantity;
                    $cartItem->save();
                }
                $cart->updateCart();
            }
            $this->getMessage()->setSuccess('Item update Successfully.');
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('cart', 'index')    ;
    }

    public function deleteAction()
    {
        $cartItem_id = $this->getRequest()->getGet('id');
        $cartItem = \Mage::getModel('Model\Cart\Item')->load($cartItem_id);
        $cartItem->delete($cartItem_id);
        $cartItem->getCart()->updateCart(); 
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