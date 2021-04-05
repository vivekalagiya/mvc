<?php $categoryOptions = $this->getCategoryOptions(); ?>
<?php $categories = $this->getCategories(); ?>
<html>

<head>
    <title>Category Table</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
        <h1>Category Table</h1>

        <a class="btn" href=<?php echo $this->getUrl()->getUrl('Category', 'edit'); ?>>Add Category</a><br><br>
        
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
                                    <a class="btn btn-success" href=<?php echo $this->getUrl()->getUrl('Category','status', ['id' => $category->category_id, 'status' => $category->status]); ?>>Enable</a></td>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Category','status', ['id' => $category->category_id, 'status' => $category->status]); ?>>Disable</a></td>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(!$category->featured) { ?>
                                    <a>False</a></td>
                                <?php } else { ?>
                                    <a>True</a></td>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('Category','edit', [ 'id' => $category->category_id]); ?> >edit</a></td>
                            <td><a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Category','delete', ['id' => $category->category_id]); ?>>delete</a></td>

                        </tr>   
              <?php endforeach; ?>   
              <?php endif; ?>   
            </tbody>
        </table>

        
    </div>
    
</body>


</html>