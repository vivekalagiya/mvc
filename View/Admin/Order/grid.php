<?php $order = $this->getOrder(); ?>
<?php echo '<pre>'; print_r($order); die;  ?>

<html>

<head>
    <title>Order Table</title>
    <link href="css/styles.css" rel="stylesheet">       

</head>

<body>
 
        <h1>Order Table</h1>

        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    
                    <th>Order Id</th>
                    <th>Customer Id</th>
                    <th>Order Total</th>
                    <th>Total Discount</th>
                    <th>Payment Id</th>
                    <th>Payment Code</th>
                    <th>Shipping Id</th>
                    <th>Shipping Code</th>
                    <th>Shipping Amount</th>

                </tr>
            </thead>
            <tbody>
                <?php if($orders) : ?>
                <?php foreach ($orders->getData() as $key => $order) : ?>
                        <tr>
                            <td><?php echo $order->order_id; ?></td>
                            <td><?php echo $order->customer_id; ?></td>
                            <td><?php echo $order->orderTotal; ?></td>
                            <td><?php echo $order->totalDiscount; ?></td>
                            <td><?php echo $order->payment_id; ?></td>
                            <td><?php echo $order->paymentCode; ?></td>
                            <td><?php echo $order->shipping_id; ?></td>
                            <td><?php echo $order->shippingCode; ?></td>
                            <td><?php echo $order->shippingAmount; ?></td>
                        </tr>
                <?php endforeach; ?> 
                <?php else : ?>
                <tr><td>No records found.</td></tr>
                <?php endif; ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>