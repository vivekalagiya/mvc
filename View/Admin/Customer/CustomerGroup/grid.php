<?php $customerGroups = $this->getCustomerGroups()->getData(); ?>

    
<html>

<head>
    <title>Customer Group</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
        <div style = "display:flex">
           <div><h1>Customer Group</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup', 'edit'); ?>').load();" href="javascript:void(0)">Add Group</a></div>
        </div> 
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
                                <?php if(!$value->default) : ?>
                                    <a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','default', ['id' => $value->group_id, 'default' => $value->default]); ?>').load()" href="javascript:void(0)" >Make Default</a>
                                <?php  else : ?>
                                    <a class="btn btn-success" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','default', ['id' => $value->group_id, 'default' => $value->default]); ?>').load()" href="javascript:void(0)" >Default</a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $value->createdDate; ?></td> 
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','edit', ['id' => $value->group_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup','delete', ['id' => $value->group_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>

                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>