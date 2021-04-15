<?php $payments = $this->getpayments(); ?>

<html>

<head>
    <title>Payment Table</title>
    <link href="css/styles.css" rel="stylesheet">       

</head>

<body>
 
        <div style = "display:flex">
           <div><h1>Payment Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Payment', 'edit',[], true); ?>').load();" href="javascript:void(0)">Add Payment</a></div>
        </div>
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
                <?php if($payments) : ?>
                <?php foreach ($payments->getData() as $key => $payment) : ?>
                        <tr>
                            <td><?php echo $payment->payment_id; ?></td>
                            <td><?php echo $payment->paymentName; ?></td>
                            <td><?php echo $payment->code; ?></td>
                            <td><?php echo $payment->description; ?></td>
                            <td>
                                <?php if(!$payment->status) { ?>    
                                    <a class="btn btn-success" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Payment','status', ['id' => $payment->payment_id, 'status' => $payment->status]); ?>').load()" href="javascript:void(0)" >Enable</a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Payment','status', ['id' => $payment->payment_id, 'status' => $payment->status]); ?>').load()" href="javascript:void(0)" >Diasble</a>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Payment','edit', ['id' => $payment->payment_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Payment','delete', ['id' => $payment->payment_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            
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