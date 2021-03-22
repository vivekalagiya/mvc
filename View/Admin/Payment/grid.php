<?php $payments = $this->getpayments(); ?>

<html>

<head>
    <title>Payment Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Payment Table</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_payment', 'edit'); ?>>Add Payment</a> <br><br>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    
                    <th>Payment_id</th>
                    <th>Payment Name</th>
                    <th>Code</th>
                    <th>description</th>
                    <th>Change status</th>
                    <th>created Date</th>
                    <th colspan='2'>Action</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($payments as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->payment_id; ?></td>
                            <td><?php echo $value->paymentName; ?></td>
                            <td><?php echo $value->code; ?></td>
                            <td><?php echo $value->description; ?></td>
                            <td>
                                <?php if(!$value->status) { ?>
                                    <a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Payment','status', ['id' => $value->payment_id, 'status' => $value->status]); ?>>Enable</a></td>
                                <?php } else { ?>
                                    <a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Payment','status', ['id' => $value->payment_id, 'status' => $value->status]); ?>>Disable</a></td>
                                <?php } ?>
                            </td>
                            <td><?php echo $value->createdDate; ?></td>
                            <td><a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Payment','edit', ['id' => $value->payment_id]); ?> >edit</a></td>
                            <td><a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Payment','delete', ['id' => $value->payment_id]); ?>>delete</a></td>

                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>