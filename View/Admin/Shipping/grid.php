<?php $shippings = $this->getShippings();?>

<html>

<head>
    <title>Shipping Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Shipping Table</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Shipping', 'add'); ?>>Add shipping</a> <br><br>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    
                    <th>Shipping_id</th>
                    <th>Shipping Name</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>description</th>
                    <th>Change status</th>
                    <th>created Date</th>
                    <th colspan='2'>Action</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($shippings as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->shipping_id; ?></td>
                            <td><?php echo $value->methodName; ?></td>
                            <td><?php echo $value->code; ?></td>
                            <td><?php echo $value->amount; ?></td>
                            <td><?php echo $value->description; ?></td>
                            <td>
                                <?php if(!$value->status) { ?>
                                    <a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Shipping','status', ['id' => $value->shipping_id, 'status' => $value->status]); ?>>Enable</a></td>
                                <?php } else { ?>
                                    <a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Shipping','status', ['id' => $value->shipping_id, 'status' => $value->status]); ?>>Disable</a></td>
                                <?php } ?>
                            </td>
                            <td><?php echo $value->createdDate; ?></td>
                            <td><a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Shipping','edit', ['id' => $value->shipping_id]);?> >edit</a></td>
                            <td><a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin_Shipping','delete', ['id' => $value->shipping_id]);?>>delete</a></td>

                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>