<?php $configGroup = $this->getConfigGroup();?>

<html>

<head>
    <title>Configuration Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <div style = "display:flex">
           <div><h1>Configuration Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('ConfigGroup', 'edit'); ?>').load();" href="javascript:void(0)">Add Configuration Group</a></div>
        </div>

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
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('ConfigGroup','edit', ['id' => $configGroup->group_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('ConfigGroup','delete', ['id' => $configGroup->group_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            
                        </tr>
                <?php endforeach; ?>
                <?php endif; ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>