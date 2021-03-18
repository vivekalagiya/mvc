<?php $customer = $this->getCustomer(); ?>
<?php // echo '<pre>'; var_dump($customer->customer_id);die; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit customer</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Edit customer</h2>
  </div>
	
  <form class="form" name='form' method="POST" action="<?php echo $this->getUrl()->getUrl('', 'save', ['id' => $customer->customer_id]) ?>">
    <table>
    
  	  	<tr class="form-group">
            <td><label>First Name</label></td>
            <td>
                <input type="text" class="form-control" name="customer[firstName]" value="<?php echo $customer->firstName ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Last Name</label></td>
            <td>
                <input type="text" class="form-control" name="customer[lastName]" value="<?php echo $customer->lastName ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Email</label></td>
            <td>
                <input type="text" class="form-control" name="customer[email]" value="<?php echo $customer->email ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Mobile</label></td>
            <td>
                <input type="text" class="form-control" name="customer[mobile]" value="<?php echo $customer->mobile ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Password</label></td>
            <td>
                <input type="text" class="form-control" name="customer[password]" value="<?php echo $customer->password ?>"  required>
            </td>
  	    </tr>
        <tr class="form-group">
            <td><label for="status">Status</label></td>
            <td>
              <select class="form-control" name="customer[status]" id="status">
                <option value="enabled" <?php if($customer->status == 1) { ?> selected <?php } ?>>Enabled</option> 
                <option value="disabled" <?php if($customer->status == 0) { ?> selected <?php } ?>>Disabled</option>
              </select>
            </td>
  	    </tr>
    </table>
         <button type="submit" class="btn" >Save</button>
  </form>
</body>
    
</html>