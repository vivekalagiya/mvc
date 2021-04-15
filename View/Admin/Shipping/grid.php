<?php $shippings = $this->getShippings();?>
<html>
<head>
    <title>Shipping Table</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

        <div style = "display:flex">
           <div><h1>Shipping Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Shipping', 'edit',[],true); ?>').load();" href="javascript:void(0)">Add Shipping</a></div>
        </div>

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
                <?php if($shippings) : ?>
                <?php foreach ($shippings->getData() as $key => $shipping) : ?>
                        <tr>
                            <td><?php echo $shipping->shipping_id; ?></td>
                            <td><?php echo $shipping->methodName; ?></td>
                            <td><?php echo $shipping->code; ?></td>
                            <td><?php echo $shipping->amount; ?></td>
                            <td><?php echo $shipping->description; ?></td>
                            <td>
                                <?php if(!$shipping->status) { ?>    
                                    <a class="btn btn-success" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Shipping','status', ['id' => $shipping->shipping_id, 'status' => $shipping->status]); ?>').load()" href="javascript:void(0)" >Enable</a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Shipping','status', ['id' => $shipping->shipping_id, 'status' => $shipping->status]); ?>').load()" href="javascript:void(0)" >Diasble</a>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Shipping','edit', ['id' => $shipping->shipping_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Shipping','delete', ['id' => $shipping->shipping_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            
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