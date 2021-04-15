<?php $configGroup = $this->getTableRow(); ?>

<?php // echo '<pre>'; print_r($configGroup); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Configuration Group</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Configuration Group</h2>
  </div>
	
  <form class="form" method="POST" action='<?php echo $this->getUrl()->getUrl('ConfigGroup','save', ['id' => $configGroup->group_id ]); ?>' >
    <table>
      
        <tr class="form-group">
            <td><label>Group Name</label></td>
            <td>
                <input type="text" class="form-control" name="configGroup[name]" value="<?php echo $configGroup->name; ?>" required>
            </td>
  	    </tr>
    </table>
         <input type="button" class="btn" onclick="object.setForm(this).load();" value="Save">
  </form>

</body>
    
</html>