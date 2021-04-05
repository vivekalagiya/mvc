<?php $customerGroups = $this->getCustomerGroups()->getData(); ?>

    
<html>

<head>
    <title>Customer Group</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Customer Group</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup', 'edit'); ?>>Add Customer Group</a> <br><br>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    
                    <th>Group Id</th>
                    <th>Group Name</th>
                    <th>Default</th>
                    <th>created Date</th>
                    <th colspan='2'>Action</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php foreach ($customerGroups as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->group_id; ?></td>
                            <td><?php echo $value->groupName; ?></td>
                            <td>
                                <?php if(!$value->default) { ?>
                                    <a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','default', ['id' => $value->group_id, 'default' => $value->default]); ?>>Make Default</a></td>
                                <?php } else { ?>
                                    <a class="btn btn-success" href=<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','default', ['id' => $value->group_id, 'default' => $value->default]); ?>>Default</a></td>
                                <?php } ?>
                            </td>
                            <td><?php echo $value->createdDate; ?></td> 
                            <td><a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','edit', ['id' => $value->group_id]); ?> >edit</a></td>
                            <td><a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','delete', ['id' => $value->group_id]); ?>>delete</a></td>

                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>