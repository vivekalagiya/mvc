<?php $customerGroup = $this->getCustomerGroup(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Customer Group</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Customer Group</h2>
  </div>
	
  <form class="form" name='form' method="POST" action="<?php echo $this->getUrl()->getUrl('Customer\CustomerGroup', 'save', ['id' => $customerGroup->group_id ]) ?>">
    <table>
    
  	  	<tr class="form-group">
            <td><label>Group Name</label></td>
            <td>
                <input type="text" class="form-control" name="customerGroup[groupName]" value="<?php echo $customerGroup->groupName ?>" required>
            </td>
  	    </tr>
        <tr class="form-group">
            <td><label for="default">Default</label></td>
            <td>
              <select class="form-control" name="customerGroup[default]" id="default">
                <option value="yes" <?php if($customerGroup->default == 1) { ?> selected <?php } ?>>yes</option> 
                <option value="no" <?php if($customerGroup->default == 0) { ?> selected <?php } ?>>no</option>
              </select>
            </td>
  	    </tr>
    </table>
         <input type="button" class="btn" onclick="object.setForm(this).load();" value="Save">
  </form>
</body>
    
</html>