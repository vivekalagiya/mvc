<?php $attribute = $this->getAttribute(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Attribute</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Edit Attribute</h2>
  </div>
	
  <form class="form" name='attribute[form]' class="form-group" method="POST" action="<?php echo $this->getUrl()->getUrl('','save', ['id' => $attribute->attribute_id]) ?>" >
    <table>
        <tr>
          <td>
            <label for="entityType">Entity Type</label>
          </td>
          <td>
            <select class="form-control" name="attribute[entityType_id]" >
              <?php foreach ($attribute->getEntityTypeOption() as $key => $value) : ?>
                <option value="<?php echo $key; ?>" <?php if($attribute->entityType_id == $key) : ?> <?php echo 'selected'; endif; ?> ><?php echo $value; ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
          <tr>
            <td><label>Name</label></td>
            <td>
                <input type="text" class="form-control" name="attribute[name]" value="<?php echo $attribute->name ?>" required>
            </td>
  	    </tr>
        <tr>
            <td><label>Code</label></td>
            <td>
                <input type="text" class="form-control" name="attribute[code]" value="<?php echo $attribute->code ?>" required>
            </td>
  	    </tr>
        <tr>
          <td>
            <label for="backendType">Backend Type</label>
          </td>
          <td>
            <select class="form-control" name="attribute[backendType]" >
              <?php foreach ($attribute->getBackendTypeOption() as $key => $value) : ?>
                <option value="<?php echo $key; ?>" <?php if($attribute->backendType == $key) : echo 'selected'; endif;?>><?php echo $value; ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <label for="inputType">Input Type</label>
          </td>
          <td>
            <select class="form-control" name="attribute[inputType]" >
              <?php foreach ($attribute->getInputTypeOption() as $key => $value) : ?>
                <option value="<?php echo $key; ?>" <?php if($attribute->inputType == $key) : echo 'selected'; endif;?>><?php echo $value; ?></option>
              <?php endforeach; ?>
            </select>
          </td>
        </tr>
        <tr>
            <td><label>Sort Order</label></td>
            <td>
                <input type="text" class="form-control" name="attribute[sortOrder]" value="<?php echo $attribute->sortOrder ?>" required>
            </td>
  	    </tr>
        <tr>
            <td><label>Backend Model</label></td>
            <td>
                <input type="text" class="form-control" name="attribute[backendModel]" value="<?php echo $attribute->backendModel ?>" required>
            </td>
  	    </tr>
        
    </table>
             
        <br> <button type="submit" class="form-control btn">Save</button>

  </form>
</body>
    
</html>