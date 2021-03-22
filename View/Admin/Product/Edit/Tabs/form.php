<?php $product = $this->getProduct(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Product</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class=" head container">
  	<h2>Manage Product</h2>
  </div>
  <form class="form" name='form' method="post" action="<?php echo $this->getUrl()->getUrl('','save',['id' => $product->product_id]) ?>" >
    <table>
  	  	<tr class="form-group">
            <td><label>SKU</label></td>
            <td>
                <input type="text" class="form-control" name="product[sku]" value="<?php echo $product->sku; ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Product Name</label></td>
            <td>
                <input type="text" class="form-control" name="product[productName]" value="<?php echo $product->productName; ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Price</label></td>
            <td>
                <input type="text" class="form-control" name="product[price]" value="<?php echo $product->price; ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>discount</label></td>
            <td>
                <input type="text" class="form-control" name="product[discount]" value="<?php echo $product->discount; ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Quantity</label></td>
            <td>
                <input type="text" class="form-control" name="product[quantity]" value="<?php echo $product->quantity; ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Description</label></td>
            <td><textarea class="form-control" name="product[description]" ><?php echo $product->description; ?></textarea>
            </td>
        </tr>
        <tr class="form-group">
            <td><label for="product[status]">Status</label></td>
            <td>
              <select class="form-control" name="product[status]" id="status">
              <?php foreach ($product->getStatusOption() as $key => $value) : ?>
                <option value="<?php echo $key; ?>" <?php if($product->status == $key): ?> selected <?php endif; ?>><?php echo $value; ?></option>
              <?php endforeach; ?>
              </select>
            </td> 
  	    </tr>
    </table>
         <button type="submit" class="btn" >Save</button>

  </form>
</body>
    
</html>

