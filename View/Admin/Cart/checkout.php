<?php $shippingAddress = $this->getShippingAddress(); ?>
<?php $billingAddress = $this->getBillingAddress(); ?>
<?php $cart = $this->getCart();?>
<?php $items = $cart->getItems();?>
<?php $shippingMethods = $this->getCart()->getShippingMethod();?>
<?php $paymentMethods = $this->getCart()->getPaymentMethod();?>
<?php //echo '<pre>'; print_r($shippingAddress); die; ?>

<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
        <div class="row">
            <p></p>
        </div>
        <div class="row">
            <div style="display: table; margin: auto;">
                <span class="step step_complete"> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('cart', 'index', ['id' => $cart->cart_id]); ?>').load();" href="javascript:void(0)" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                <span class="step_thankyou check-bc step_complete">Thank you</span>
            </div>
        </div>
        <div class="row">
            <p></p>
        </div>
        </div>
    </div>    
    <div class="row cart-body">
        <form class="form-horizontal" id="checkoutForm" method="post" action="<?= $this->geturl()->getUrl('cart\checkout', 'save', ['id' => $cart->cart_id]) ?>">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
            <!--REVIEW ORDER-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                </div>
                <div class="panel-body">
                    <?php foreach ($items->getData() as $key => $item) : ?>
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-6">
                            <div class="col-xs-12"><?= $item->getProduct()->productName; ?></div>
                            <div class="col-xs-12"><small>Quantity:<span><?= $item->quantity; ?></span></small></div>
                            <div class="col-xs-12"><small>Price:<span><?= $item->price; ?></span></small></div>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <div class="col-xs-12">discount: $<span><?= $discount = $item->getProduct()->discount; ?><span></div>
                            <div class="col-xs-12">Total discount: $<span><?= $discount = $item->getProduct()->discount * $item->quantity; ?><span></div>
                        </div>
                        <div class="col-sm-6 col-xs-6 text-right">
                            <h6><span>$</span><?= ($item->getProduct()->price * $item->quantity) - $discount; ?></h6>
                        </div>
                    </div>
                    <div class="form-group"><hr /></div>
                    <?php endforeach; ?>
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <strong>Subtotal</strong>
                            <div class="pull-right"><span>$</span><span><?= $cartTotal = $this->getCartTotal(); ?></span></div>
                        </div>
                        <div class="col-xs-12">
                            <small>Shipping</small>
                            <div class="pull-right"><span>- $</span><span><?= $shippingCharge = $this->getShippingCharge(); ?></span></div>
                        </div>
                    </div>
                    <div class="form-group"><hr /></div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <strong>Order Total</strong>
                            <div class="pull-right"><span>$</span><span><?= $cartTotal - $shippingCharge; ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--REVIEW ORDER END-->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
            <!--SHIPPING METHOD-->
            <div class="panel panel-info">
                <div class="panel-heading">Address</div>
                <div style="display:flex">
                <div class="panel-body">
                        <div class="form-group">
                            <div class="panel col-md-12">
                                <h4>Billing Address</h4>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="billing[address]" class="form-control" value="<?= $billingAddress->address ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>City:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="billing[city]" class="form-control" value="<?= $billingAddress->city ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>State:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="billing[state]" class="form-control" value="<?= $billingAddress->state ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Country:</strong></div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="billing[country]" value="<?= $billingAddress->country ?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Zip Code:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="billing[zipCode]" class="form-control" value="<?= $billingAddress->zipCode ?>" required/>
                            </div>
                        </div>
                        <div>
                                <input type="checkbox" name="saveBillingIntoAddressBook" value="saveIntoAddressBook">
                                <label for="saveIntoAddressBook">Save into Address book.</label>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="panel col-md-12">
                                <h4>Shipping Address</h4>
                            </div>
                        </div>
                        <div>
                                <input type="checkbox" name="sameAsBilling[shipping]" value="SameAsBilling">
                                <label for="sameAsbilling">Same As billing</label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="shipping[address]" class="form-control" value="<?= $shippingAddress->address ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>City:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="shipping[city]" class="form-control" value="<?= $shippingAddress->city ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>State:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="shipping[state]" class="form-control" value="<?= $shippingAddress->state ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Country:</strong></div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="shipping[country]" value="<?= $shippingAddress->country ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Zip Code:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="shipping[zipCode]" class="form-control" value="<?= $shippingAddress->zipCode ?>" />
                            </div>
                        </div>
                        <div>
                                <input type="checkbox" name="saveShippingIntoAddressBook" value="saveIntoAddressBook">
                                <label for="saveIntoAddressBook">Save into Address book.</label>
                        </div>
                    </div>
                </div>
                     <input class="btn" type="button" onclick="object.setForm(this).load();" value="save" >
            </div>
            <!--SHIPPING METHOD END-->
            <!--CREDIT CART PAYMENT-->
            <div class="panel panel-info">
                <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12"><strong>Payment Method:</strong></div>
                        <div class="col-md-12">
                            <select name="paymentMethod" class="form-control">
                                <?php foreach ($paymentMethods->getData() as $key => $paymentMethod) : ?>
                                    <option value="<?= $paymentMethod->payment_id; ?>" <?php if($paymentMethod->payment_id == $cart->payment_id) { echo 'selected'; } ?>><?= $paymentMethod->paymentName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <span>Pay secure using your credit card.</span>
                        </div>
                        <div class="col-md-12">
                            <ul class="cards">
                                <li class="visa hand">Visa</li>
                                <li class="mastercard hand">MasterCard</li>
                                <li class="amex hand">Amex</li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="button" class="btn btn-primary btn-submit-fix" onclick="savePaymentMethod(this)" href="javascript:void(0)" value="Save" >
                        </div>
                    </div>
                </div>
            </div>
            <!--CREDIT CART PAYMENT END-->
            <!-- SHIPPING METHOD -->
            <div class="panel panel-info">
                <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span>Shipping Method</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12"><strong>Shipping Method:</strong></div>
                        <div class="col-md-12">
                        <select name="shippingMethod" class="form-control">
                                <?php foreach ($shippingMethods->getData() as $key => $shippingMethod) : ?>
                                    <option value="<?= $shippingMethod->shipping_id ?>" <?php if($shippingMethod->shipping_id == $cart->shipping_id) { echo 'selected'; } ?>><?= $shippingMethod->methodName ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="button"  class="btn btn-primary btn-submit-fix" onclick="saveShippingMethod(this)" href="javascript:void(0)" value="Save" >
                        </div>
                    </div>
                </div>
            </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="button"  class="btn btn-primary btn-submit-fix" onclick="placeOrder(this)" href="javascript:void(0)" value="Place Order" >
                        </div>
                    </div>
            <!--SHIPPING METHOD END-->
        </div>
        
    </form>
</div>
</div>

<script>

var placeOrder = function(button) {
    var form = document.getElementById('checkoutForm');
    form.setAttribute('Action', '<?= $this->getUrl()->getUrl('Order', 'placeOrder', ['id' => $cart->cart_id ]); ?>');
    object.setForm(button).load();
    // form.submit();
}

var savePaymentMethod = function(button) {
    var form = document.getElementById('checkoutForm');
    form.setAttribute('Action', '<?= $this->getUrl()->getUrl('', 'savePaymentMethod', ['id' => $cart->cart_id ]); ?>');
    object.setForm(button).load();
    // form.submit();
}

var saveShippingMethod = function(button) {
    var form = document.getElementById('checkoutForm');
    form.setAttribute('Action', '<?= $this->getUrl()->getUrl('', 'saveShippingMethod', ['id' => $cart->cart_id ]); ?>');
    object.setForm(button).load();
    // form.submit();
}

</script>