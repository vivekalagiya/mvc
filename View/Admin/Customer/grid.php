<?php $customers = $this->getCustomers()->getData(); ?>
    
<html>

<head>
    <title>Customer Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <div style = "display:flex">
           <div><h1>Customer Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer', 'edit',[],true); ?>').load();" href="javascript:void(0)">Add Customer</a></div>
        </div>

        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    
                    <th>Customer_id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Change status</th>
                    <th colspan='2'>Action</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $key => $customer) { ?>
                        <tr>
                            <td><?php echo $customer->customer_id; ?></td>
                            <td><?php echo $customer->firstName; ?></td>
                            <td><?php echo $customer->lastName; ?></td>
                            <td><?php echo $customer->email; ?></td>
                            <td><?php echo $customer->mobile; ?></td>
                            <td><?php echo $customer->password; ?></td>
                            <td>
                                <?php if(!$customer->status) { ?>    
                                    <a class="btn btn-success" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer','status', ['id' => $customer->customer_id, 'status' => $customer->status]); ?>').load()" href="javascript:void(0)" >Enable</a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer','status', ['id' => $customer->customer_id, 'status' => $customer->status]); ?>').load()" href="javascript:void(0)" >Diasble</a>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer','edit', ['id' => $customer->customer_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer','delete', ['id' => $customer->customer_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            
                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>