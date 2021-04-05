<?php 

namespace Controller\Admin;

class Order extends \Controller\core\Admin 
{

    public function indexAction()
    {
        $layout = $this->getlayout();
        $layout->setTemplate('View/core/layout/one_column.php');
        $grid = \Mage::getBlock('Block\Admin\Order\Grid');
        $content = $layout->getContent()->addChild($grid);
        $this->renderlayout();
        
    }

    
    public function placeOrderAction()
    {
        $cart_id = $this->getRequest()->getGet('id');
        $cart = \Mage::getModel('Model\Cart')->load($cart_id);
        
        $payment_id = $cart->payment_id;
        $shipping_id = $cart->shipping_id;
        $shipping = \Mage::getModel('Model\Shipping')->load($shipping_id);
        $payment = \Mage::getModel('Model\Payment')->load($payment_id);
        $checkout = \Mage::getBlock('Block\Admin\Cart\Checkout')->setCart($cart);
        
        $order = \Mage::getModel('Model\Order');
        $order->customer_id = $cart->customer_id;
        $order->orderTotal = $checkout->getCartTotal();
        $order->totalDiscount = $checkout->getTotalDiscount();
        $order->payment_id = $payment_id;
        $order->paymentCode = $payment->code;
        $order->shipping_id = $shipping_id;
        $order->shippingCode = $shipping->code;
        $order->shippingAmount = $shipping->amount;
        $order->save();

        $addItem = $order->addItemToOrder($cart);


        $this->getMessage()->setSuccess('Order Placed Successfully.');
        $this->redirect('', 'index', ['id' => $order->order_id]);
    }


}




?>