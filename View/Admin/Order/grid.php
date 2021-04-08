<?php $orderItems = $this->getOrder()->getItems(); ?>
<?php // echo '<pre>'; print_r($orderItems); die;  ?>

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
                    <th>Product Id</th>
                    <th>Sku</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount</th>

                </tr>
            </thead>
            <tbody>
                <?php if($orderItems) : ?>
                <?php foreach ($orderItems->getData() as $key => $orderItem) : ?>
                        <tr>
                            <td><?php echo $orderItem->order_id; ?></td>
                            <td><?php echo $orderItem->product_id; ?></td>
                            <td><?php echo $orderItem->sku; ?></td>
                            <td><?php echo $orderItem->productName; ?></td>
                            <td><?php echo $orderItem->quantity; ?></td>
                            <td><?php echo $orderItem->price; ?></td>
                            <td><?php echo $orderItem->discount; ?></td>
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