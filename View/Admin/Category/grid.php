<?php $categoryOptions = $this->getCategoryOptions(); ?>
<?php $categories = $this->getCategories(); ?>
<html>

<head>
    <title>Category Table</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

        <div style = "display:flex">
           <div><h1>Category Table</h1></div>
           <div class="add"><a class="btn" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Category', 'edit'); ?>').load();" href="javascript:void(0)">Add Category</a></div>
        </div>
        
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    <th>Category_id</th>
                    <th>Category Name</th>
                    <th>Parent_id</th>
                    <th>Path_id</th>
                    <th>description</th>
                    <th>Change Status</th>
                    <th>Featured</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!$this->getCategories()) : ?>
                <tr><td colspan="9">No Records Found!</td></tr>
                <?php else : ?>
                <?php foreach ($categories->getData() as $category) : ?>
                        <tr>
                            <td><?php echo $category->category_id; ?></td>
                              <td><?php echo $categoryOptions[$category->category_id]; ?></td>
                            <td><?php echo $category->parent_id; ?></td>
                            <td><?php echo $category->path_id; ?></td>
                            <td><?php echo $category->description; ?></td>
                            <td>
                                <?php if(!$category->status) { ?>    
                                    <a class="btn btn-success" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Category','status', ['id' => $category->category_id, 'status' => $category->status]); ?>').load()" href="javascript:void(0)" >Enable</a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Category','status', ['id' => $category->category_id, 'status' => $category->status]); ?>').load()" href="javascript:void(0)" >Diasble</a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!$category->featured) { ?>
                                    <a>False</a></td>
                                <?php } else { ?>
                                    <a>True</a></td>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Category','edit', ['id' => $category->category_id]); ?>').load()" href="javascript:void(0)" >edit</a></td>
                            <td><a class="btn btn-danger" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Category','delete', ['id' => $category->category_id]); ?>').load()" href="javascript:void(0)" >Delete</a></td>
                            
                        </tr>   
              <?php endforeach; ?>   
              <?php endif; ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>