<?php $attribute = $this->getAttribute();?>

<html>

<head>
    <title>Attribute Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <div style = "display:flex">
           <div><h1>Attribute Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Attribute', 'edit'); ?>').load();" href="javascript:void(0)">Add Attribute</a></div>
        </div>
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>Attribute Id</th>
                    <th>Entity Type Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Input Type</th>
                    <th>Backend Type</th>
                    <th>Sort Order</th>
                    <th>Backend Model</th>
                    <th colspan='3'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!$attribute) : ?>
                <tr><td colspan="7">No records found.</td></tr>
                <?php else : ?>
                <?php foreach ($attribute->getData() as $key => $attribute) : ?>
                        <tr>
                            <td><?php echo $attribute->attribute_id; ?></td>
                            <td><?php echo $attribute->entityType_id; ?></td>
                            <td><?php echo $attribute->name; ?></td>
                            <td><?php echo $attribute->code; ?></td>
                            <td><?php echo $attribute->inputType; ?></td>
                            <td><?php echo $attribute->backendType; ?></td>
                            <td><?php echo $attribute->sortOrder; ?></td>
                            <td><?php echo $attribute->backendModel; ?></td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Attribute','edit', ['id' => $attribute->attribute_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Attribute','delete', ['id' => $attribute->attribute_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Attribute','option', ['id' => $attribute->attribute_id]); ?>').load()" href="javascript:void(0)" >Option</a></td>

                        </tr>
                <?php endforeach; ?>
                <?php endif; ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>