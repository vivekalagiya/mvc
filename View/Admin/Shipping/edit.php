<?php $shipping = $this->getShipping(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Shipping</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Edit Shipping</h2>
  </div>
	
  <form class="form" name='shipping[form]' method="POST" action="<?php echo $this->getUrl()->getUrl('Admin_shipping', 'save', ['id' => $shipping->shipping_id ]) ?>" >
    <table>
      
        
  	  	
          <tr class="form-group">
            <td><label>shipping Name</label></td>
            <td>
                <input type="text" name="shipping[methodName]" value="<?php echo $shipping->methodName ?>" required>
            </td>
  	    </tr>
        <tr class="form-group">
            <td><label>Code</label></td>
            <td>
                <input type="text" name="shipping[code]" value="<?php echo $shipping->code ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Amount</label></td>
            <td>
                <input type="text" name="shipping[amount]" value="<?php echo $shipping->amount ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Description</label></td>
            <td><textarea name="shipping[description]" ><?php echo $shipping->description ?></textarea>
            </td>
        </tr>
        <tr class="form-group">
            <td><label for="status">Status</label></td>
            <td>
              <select name="shipping[status]" id="status">
                <option value="enabled" <?php if($shipping->status == 1) { ?> selected <?php } ?>>Enabled</option> 
                <option value="disabled" <?php if($shipping->status == 0) { ?> selected <?php } ?>>Disabled</option>
              </select>
            </td>
  	    </tr>
        
        
        
    </table>
               
             
         <button type="submit" class="btn" >Save</button>

  </form>
</body>
    
</html>