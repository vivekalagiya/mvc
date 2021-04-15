<?php $customers = $this->getCustomers();?>
<?php $cart = $this->getCart();?>
<?php $items = $this->getCart()->getItems();?>
<?php //echo '<pre>'; print_r($cart); die;?>
<html>

<head>
    <title>Cart</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Cart</h1>

        <a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Product', 'index') ?>').load();" href="javascript:void(0)">Back to Item</a> <br><br>
        
        <form method="POST" id="cartForm" action="<?= $this->getUrl()->getUrl('', 'update') ?>">
        <input type="button" class= "btn btn-primary" onclick="object.setForm(this).load();" href="javascript:void(0)" value="update"><br><br>
        <table class="table" id="table1" name="table1">
        <select class="form-control" name="customer_id" id="customer_id">
            <option value="">select customer</option>
            <?php foreach ($customers->getData() as $key => $customer) : ?>
            <option value="<?= $customer->customer_id ?>" <?php if($customer->customer_id == $cart->customer_id) { echo 'selected'; } ?>><?= $customer->firstName ?></option>
            <?php endforeach; ?>
        </select>
        <input class="btn" type="button" name="go" id="go" onclick="selectCustomer(this)" value="Go">
            <thead class="thead">
                <tr>
                    <th>Cart Id</th>
                    <th>Product Id</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Discount</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($items) : ?>
                <?php foreach ($items->getData() as $key => $item) : ?>
                        <tr>
                            <td><?php echo $item->cart_id; ?></td>
                            <td><?php echo $item->product_id; ?></td>
                            <td><?php echo $item->price / $item->quantity; ?></td>
                            <td><input type="number" name="quantity[<?= $item->cartItem_id ?>]" value = "<?= $item->quantity; ?>"></td>
                            <td><?php echo $item->price; ?></td>
                            <td><?php echo $item->discount; ?></td>
                            <td><?php echo $item->price - $item->discount; ?></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('','delete', ['id' => $item->cartItem_id]);?>').load();" href="javascript:void(0)">delete</a></td>
                        </tr>
                <?php endforeach; ?> 
                <?php endif; ?> 

            </tbody>
        </table>
        </form>
        <a class="btn" onclick="object.setUrl('<?= $this->getUrl()->getUrl('Cart\checkout', 'index', ['id' => $cart->cart_id]); ?>').load();" href="javascript:void(0)">Proceed To Checkout</a>
    </div>
    
</body>
</html>

<script>

var selectCustomer = function(button) {
    var form = document.getElementById('cartForm');
    form.setAttribute('Action', '<?= $this->getUrl()->getUrl('Cart', 'selectCustomer'); ?>');
    object.setForm(button).load();
    // form.submit();
}

</script>