<?php $brands = $this->getBrands();?>
<html>
<head>
    <title>Brand Table</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
        <h1>Brand Table</h1>
        <a class="btn" href=<?php echo $this->getUrl()->getUrl('Brand', 'edit'); ?>>Add Brand</a> <br><br>
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
                                    <a class="btn btn-success" href=<?php echo $this->getUrl()->getUrl('Brand','status', ['id' => $value->brand_id, 'status' => $value->status]); ?>>Enable</a></td>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Brand','status', ['id' => $value->brand_id, 'status' => $value->status]); ?>>Disable</a></td>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('Brand','edit', ['id' => $value->brand_id]);?> >edit</a></td>
                            <td><a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Brand','delete', ['id' => $value->brand_id]);?>>delete</a></td>
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