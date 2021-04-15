<?php $brands = $this->getBrands();?>
<html>
<head>
    <title>Brand Table</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

        <div style = "display:flex">
           <div><h1>Brand Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Brand', 'edit'); ?>').load();" href="javascript:void(0)">Add Brand</a></div>
        </div>
        <table class="table" id="table1" name="table1"> 
            <thead class="thead">
                <tr>
                    <th>Brand_id</th>
                    <th>Brand Name</th>
                    <th>Brand Image</th>
                    <th>Change status</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($brands) : ?>
                <?php foreach ($brands->getData() as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value->brand_id; ?></td>
                            <td><?php echo $value->brandName; ?></td>
                            <td><?php echo $value->brandImage; ?></td>
                            <td>
                                <?php if(!$value->status) { ?>    
                                    <a class="btn btn-success" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Brand','status', ['id' => $value->brand_id, 'status' => $value->status]); ?>').load()" href="javascript:void(0)" >Enable</a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Brand','status', ['id' => $value->brand_id, 'status' => $value->status]); ?>').load()" href="javascript:void(0)" >Diasble</a>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Brand','edit', ['id' => $value->brand_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Brand','delete', ['id' => $value->brand_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            
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