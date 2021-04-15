<?php $cms = $this->getCms(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit cms</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Edit cms</h2>
  </div>
	
  <form class="form" name='cms[form]' method="POST" action="<?php echo $this->getUrl()->getUrl('Cms', 'save', ['id' => $cms->cms_id ]) ?>" >
    <table class="table">
      
        <tr class="form-group">
            <td><label for="status">Status</label></td>
            <td>
              <select class="form-control" name="cms[status]" id="status">
                <option value="enabled" <?php if($cms->status == 1) { ?> selected <?php } ?>>Enabled</option> 
                <option value="disabled" <?php if($cms->status == 0) { ?> selected <?php } ?>>Disabled</option>
              </select>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Title</label></td>
            <td>
                <input class="form-control" type="text" name="cms[title]" value="<?php echo $cms->title ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Identifier</label></td>
            <td>
                <input class="form-control" type="text" name="cms[identifier]" value="<?php echo $cms->identifier ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Content</label></td>
            <td>
                <textarea class="form-control" type="text" name="cms[content]" value="<?php echo $cms->content ?>"  required></textarea>
            </td>
  	    </tr>
        
    </table>
         <input type="button" class="btn" onclick="object.setForm(this).load();" value="Save">

  </form>
</body>
    
</html>

<script src="skin/ckeditor/ckeditor.js"></script>
<script>
  CKEDITOR.replace('cms[content]');
</script>