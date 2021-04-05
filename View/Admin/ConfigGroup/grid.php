<?php $configGroup = $this->getConfigGroup();?>

<html>

<head>
    <title>Configuration Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Configuration Table</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('ConfigGroup', 'edit'); ?>>Add Configuration Group</a> <br><br>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>Group Id</th>
                    <th>Name</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!$configGroup) : ?>
                <tr><td colspan="7">No records found.</td></tr>
                <?php else : ?>
                <?php foreach ($configGroup->getData() as $key => $configGroup) : ?>
                        <tr>
                            <td><?php echo $configGroup->group_id; ?></td>
                            <td><?php echo $configGroup->name; ?></td>
                            <td><a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('ConfigGroup','edit', ['id' => $configGroup->group_id]); ?> >edit</a></td>
                            <td><a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('ConfigGroup','delete', ['id' => $configGroup->group_id]); ?>>delete</a></td>

                        </tr>
                <?php endforeach; ?>
                <?php endif; ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>