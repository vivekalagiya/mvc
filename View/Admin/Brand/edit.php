<?php $brand = $this->getBrand(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Brand</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Edit Brand</h2>
  </div>
	
  <form class="form" name='brand[form]' method="POST" action="<?php echo $this->getUrl()->getUrl('Brand', 'save', ['id' => $brand->brand_id ]) ?>" enctype="multipart/form-data" >
    <table>
      
        
  	  	
          <tr class="form-group">
            <td><label>Brand Name</label></td>
            <td>
                <input class="form-control" type="text" name="brand[brandName]" value="<?php echo $brand->brandName ?>" required>
            </td>
  	    </tr>
        <tr class="form-group">
            <td><label>Brand Image</label></td>
            <td>
                <input class="form-control" type="file" name="brandImage" value="<?php echo $brand->brandImage ?>" >
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Sort Order</label></td>
            <td>
                <input class="form-control" type="text" name="brand[sortOrder]" value="<?php echo $brand->sortOrder ?>"  required>
            </td>
  	    </tr>
        <tr class="form-group">
            <td><label for="status">Status</label></td>
            <td>
              <select class="form-control" name="brand[status]" id="status">
                <option value="enabled" <?php if($brand->status == 1) { ?> selected <?php } ?>>Enabled</option> 
                <option value="disabled" <?php if($brand->status == 0) { ?> selected <?php } ?>>Disabled</option>
              </select>
            </td>
  	    </tr>
    </table>
         <input type="button" class="btn" onclick="object.setForm(this).load();" value="Save">

  </form>
</body>
    
</html>