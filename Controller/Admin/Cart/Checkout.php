<?php 

namespace Controller\Admin\Cart;

class Checkout extends \Controller\Core\Admin 
{
    public function indexAction()
    {
        $cart_id = $this->getRequest()->getGet('id');
        $layout = $this->getLayout();
        $layout->setTemplate('View/core/layout/one_column.php');
        $content = $layout->getContent();
        $cart = \Mage::getModel('Model\Cart')->load($cart_id);
        if(!$cart) {
            $cart = \Mage::getModel('Model\Cart');
        }
        if(!$cart->getItems()) {
            $this->getMessage()->setFailure('select atleast one item.');
            $this->redirect('cart', 'index', ['id' => $cart_id]);
        }
        $checkout = \Mage::getBlock('Block\Admin\Cart\Checkout')->setCart($cart);
        $content->addChild($checkout);
        $this->renderLayout();
    }
    
    public function saveAction()
    {
        $cart_id = $this->getRequest()->getGet('id');
        $billing = $this->getRequest()->getPost('billing');
        $shipping = $this->getRequest()->getPost('shipping');
        $cart = \Mage::getModel('Model\Cart')->load($cart_id);
        
        $billingAddress = $cart->getBillingAddress();
        if(!$billingAddress) {
            $billingAddress = \Mage::getModel('Model\Cart\Address');
        }
        $billingAddress->setData($billing);
        $billingAddress->cart_id = $cart_id;
        $billingAddress->addressType = 'billing';
        $billingAddress->save();
        
        $postData = $this->getRequest()->getPost();
        
        if(array_key_exists('sameAsBilling', $postData)) {
            $shipping = $billing;
        }
        $shippingAddress = $cart->getShippingAddress();
        if(!$shippingAddress) {
            $shippingAddress = \Mage::getModel('Model\Cart\Address');
        }
        $shippingAddress->setData($shipping);
        $shippingAddress->cart_id = $cart_id;
        $shippingAddress->addressType = 'shipping';
        $shippingAddress->save();
        
        if(array_key_exists('saveBillingIntoAddressBook', $postData)) {
            $customer_id = $cart->getCustomer()->customer_id;
            $query = "SELECT * FROM `customerAddresses` WHERE `customer_id` = '{$customer_id}' AND `addressType` = 'billing' ";
            $billingAddress = \Mage::getModel('Model\Customer\CustomerAddresses')->fetchRow($query);
            
            if($billingAddress) {
                $billingAddress->setData($billing);
                $billingAddress->addressType = 'billing';
                $billingAddress->save();
            } else {
                $billingAddress = \Mage::getModel('Model\Customer\CustomerAddresses');
                $billingAddress->setData($billing);
                $billingAddress->addressType = 'billing';
                $billingAddress->customer_id = $customer_id;
                $billingAddress->save();
            }
        }
        
        if(array_key_exists('saveShippingIntoAddressBook', $postData)) {
            $customer_id = $cart->getCustomer()->customer_id;
            $query = "SELECT * FROM `customerAddresses` WHERE `customer_id` = '{$customer_id}' AND `addressType` = 'shipping' ";
            $shippingAddress = \Mage::getModel('Model\Customer\CustomerAddresses')->fetchRow($query);
            if($shippingAddress) {
                $shippingAddress->setData($shipping);
                $shippingAddress->addressType = 'shipping';
                $shippingAddress->save();
            } else {
                $shippingAddress = \Mage::getModel('Model\Customer\CustomerAddresses');
                $shippingAddress->setData($shipping);
                $shippingAddress->addressType = 'shipping';
                $shippingAddress->customer_id = $customer_id;
                $shippingAddress->save();
            }
        }
        
        $this->redirect('', 'index', ['id' => $cart_id]);
    }
    
    public function savePaymentMethodAction()
    {
        $cart_id = $this->getRequest()->getGet('id');
        $cart = \Mage::getModel('Model\Cart')->load($cart_id);
        $payment_id = $this->getRequest()->getPost('paymentMethod');
        $cart->payment_id = $payment_id;
        $cart->save();
        $this->redirect('', 'index', ['id' => $cart_id]);
    }
    
    public function saveShippingMethodAction()
    {
        $cart_id = $this->getRequest()->getGet('id');
        $cart = \Mage::getModel('Model\Cart')->load($cart_id);
        $shipping_id = $this->getRequest()->getPost('shippingMethod');
        
        $shipping = \Mage::getModel('Model\Shipping')->load($shipping_id);

        $cart->shipping_id = $shipping_id;
        $cart->shippingAmount = $shipping->amount;
        $cart->save();
        $this->redirect('', 'index', ['id' => $cart_id]);
    }

}





?>