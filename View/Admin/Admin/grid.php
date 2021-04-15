<?php $admins = $this->getAdmin()->getData();?>

<html>

<head>
    <title>Admin Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <div style = "display:flex">
           <div><h1>Admin Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Admin', 'edit'); ?>').load();" href="javascript:void(0)">Add Admin</a></div>
        </div>
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>Admin id</th>
                    <th>Username</th>
                    <th>password</th>
                    <th>Change status</th>
                    <th>created Date</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $key => $admin) { ?>
                        <tr>
                            <td><?php echo $admin->admin_id; ?></td>
                            <td><?php echo $admin->userName; ?></td>
                            <td><?php echo $admin->password; ?></td>
                            <td>
                                <?php if(!$admin->status) { ?>    
                                    <a class="btn btn-success" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Admin','status', ['id' => $admin->admin_id, 'status' => $admin->status]); ?>').load()" href="javascript:void(0)" >Enable</a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Admin','status', ['id' => $admin->admin_id, 'status' => $admin->status]); ?>').load()" href="javascript:void(0)" >Diasble</a>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Admin','edit', ['id' => $admin->admin_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Admin','delete', ['id' => $admin->admin_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            
                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>