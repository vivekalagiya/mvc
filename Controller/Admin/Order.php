<?php 

namespace Controller\Admin;

class Order extends \Controller\core\Admin 
{

    public function indexAction()
    {
        // $layout = $this->getlayout();
        // $layout->setTemplate('View/core/layout/one_column.php');
        $grid = \Mage::getBlock('Block\Admin\Order\Grid');

        $order_id = $this->getRequest()->getGet('id');
        $order = \Mage::getModel('Model\Order')->load($order_id);
        $orderGrid = $grid->setOrder($order)->toHtml();
        // $content = $layout->getContent()->addChild($grid);
        // $this->renderlayout();

        $response = [
            'status' => 'success',
            'message' => 'i did.',
            'element' => [
                'selector' => '#contentHtml',
                'html' => $orderGrid
            ]
        ];

        header("Content-type: application/json; charset=utf-8");
        echo json_encode($response);

        
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
        $order->orderTotal = $cart->total;
        $order->totalDiscount = $cart->discount;
        $order->payment_id = $payment_id;
        $order->paymentCode = $payment->code;
        $order->shipping_id = $shipping_id;
        $order->shippingCode = $shipping->code;
        $order->shippingAmount = $shipping->amount;
        $order->save();

        $items = $cart->getItems();
        $order->addItemToOrder($items);

        $billingAddress = $cart->getBillingAddress();
        $shippingAddress = $cart->getShippingAddress();
        // echo '<pre>';
        // print_r($billingAddress);die;
        $order->setOrderBillingAddress($billingAddress);
        $order->setOrderShippingAddress($shippingAddress);   
        $cart->delete($cart_id);  

        $this->getMessage()->setSuccess('Order Placed Successfully.');
        $this->redirect('', 'index', ['id' => $order->order_id]);
    }

}




?>