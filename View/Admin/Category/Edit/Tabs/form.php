<?php  $category = $this->getTableRow(); ?>
<?php  $categoryOptions = $this->getCategoryOptions($category->path_id);  ?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Category</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Manage Category</h2>
  </div>
	
  <form class="form" method="POST" action='<?php echo $this->getUrl()->getUrl('Category','save', ['id' => $category->category_id ]); ?>' >
    <table>

          <tr class="form-group">
              <td><label for="parent_id">Choose a parent Category:</label></td>
              <td>
                  <select class="form-control" name="category[parent_id]" id="parent_id">
                  <option value=''>select</option>
                    <?php foreach ($categoryOptions as $category_id => $categoryName) : ?>
                    <?php if($category->category_id != $category_id) : ?>
                        <option value="<?php echo $category_id; ?>" <?php if($category_id == $category->parent_id) : ?> selected <?php endif; ?>><?php echo $categoryName; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
              </td>
          </tr>

      
        <tr class="form-group">
            <td><label>Category Name</label></td>
            <td>
                <input type="text" class="form-control" name="category[categoryName]" value="<?php echo $category->categoryName; ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Description</label></td>
            <td><textarea class="form-control" name="category[description]" ><?php echo $category->description; ?></textarea>
            </td>
        </tr>
        
        <tr class="form-group">
            <td><label for="category[status]">Status</label></td>
            <td>
              <select class="form-control" name="category[status]" id="status">
              <?php foreach ($category->getStatusOption() as $key => $value) : ?>
                <option value="<?php echo $key; ?>" <?php if($category->status == $key): ?> selected <?php endif; ?>><?php echo $value; ?></option>
              <?php endforeach; ?>
              </select>
            </td> 
  	    </tr>
        <tr class="form-group">
            <td><label for="category[featured]">Featured</label></td>
            <td>
              <select class="form-control" name="category[featured]" id="featured">
              <?php foreach ($category->getFeaturedOption() as $key => $value) : ?>
                <option value="<?php echo $key; ?>" <?php if($category->featured == $key): ?> selected <?php endif; ?>><?php echo $value; ?></option>
              <?php endforeach; ?>
              </select>
            </td> 
  	    </tr>
    </table>
     <button type="submit" class="btn" >Save</button>
  </form>
</body>
    
</html>