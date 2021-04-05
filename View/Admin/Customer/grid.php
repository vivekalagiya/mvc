<?php $customers = $this->getCustomers()->getData(); ?>
    
<html>

<head>
    <title>Customer Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Customer Table</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('customer', 'edit'); ?>>Add Customer</a> <br><br>
        
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
                    <th>created Date</th>
                    <th>updated Date</th>
                    <th colspan='2'>Action</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->customer_id; ?></td>
                            <td><?php echo $value->firstName; ?></td>
                            <td><?php echo $value->lastName; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->mobile; ?></td>
                            <td><?php echo $value->password; ?></td>
                            <td>
                                <?php if(!$value->status) { ?>
                                    <a class="btn btn-success" href=<?php echo $this->getUrl()->getUrl('customer','status', ['id' => $value->customer_id, 'status' => $value->status]) ?>>Enable</a></td>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('customer','status', ['id' => $value->customer_id, 'status' => $value->status]) ?>>Disable</a></td>
                                <?php } ?>
                            </td>
                            <td><?php echo $value->createdDate; ?></td>
                            <td><?php echo $value->updatedDate; ?></td>
                            <td><a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('customer','edit', ['id' => $value->customer_id]); ?> >edit</a></td>
                            <td><a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('customer','delete', ['id' => $value->customer_id]); ?>>delete</a></td>

                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>