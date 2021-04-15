<?php $admin = $this->getAdmin(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Admin</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Edit Admin</h2>
  </div>
	
  <form class="form" name='admin[form]' method="POST" action="<?php echo $this->getUrl()->getUrl('','save', ['id' => $admin->admin_id]) ?>" >
    <table>
      
        
  	  	
          <tr class="form-group">
            <td><label>Username</label></td>
            <td>
                <input class="form-control" type="text" name="admin[userName]" value="<?php echo $admin->userName ?>" required>
            </td>
  	    </tr>
        <tr class="form-group">
            <td><label>Password</label></td>
            <td>
                <input class="form-control" type="text" name="admin[password]" value="<?php echo $admin->password ?>" required>
            </td>
  	    </tr>
        <tr class="form-group">
            <td><label for="status">Status</label></td>
            <td>
              <select class="form-control" name="admin[status]" id="status">
                <option value="enabled" <?php if($admin->status == 1) { ?> selected <?php } ?>>Enabled</option> 
                <option value="disabled" <?php if($admin->status == 0) { ?> selected <?php } ?>>Disabled</option>
              </select>
            </td>
  	    </tr>
        
    </table>
        <input type="button" class="btn" onclick="object.setForm(this).load();" value="Save">

  </form>
</body>
    
</html>