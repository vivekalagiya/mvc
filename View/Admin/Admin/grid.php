<?php $admin = $this->getAdmin()->getData();?>

<html>

<head>
    <title>Admin Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Admin Table</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('Admin', 'edit'); ?>>Add Admin</a> <br><br>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>Admin_id</th>
                    <th>Username</th>
                    <th>password</th>
                    <th>Change status</th>
                    <th>created Date</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value->admin_id; ?></td>
                            <td><?php echo $value->userName; ?></td>
                            <td><?php echo $value->password; ?></td>
                            <td>
                                <?php if(!$value->status) { ?>
                                    <a class="btn btn-success" href=<?php echo $this->getUrl()->getUrl('Admin','status', ['id' => $value->admin_id, 'status' => $value->status]); ?>>Enable</a></td>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Admin','status', ['id' => $value->admin_id, 'status' => $value->status]); ?>>Disable</a></td>
                                <?php } ?>
                            </td>
                            <td><?php echo $value->createdDate; ?></td>
                            <td><a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('Admin','edit', ['id' => $value->admin_id]); ?> >edit</a></td>
                            <td><a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Admin','delete', ['id' => $value->admin_id]); ?>>delete</a></td>

                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>