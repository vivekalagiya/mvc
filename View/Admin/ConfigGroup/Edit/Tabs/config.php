<?php $configs = $this->getTableRow()->getConfigs(); ?>
<?php  // echo '<pre>'; print_r($configs);die; ?>

<html>

<head>
    <title>Config Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Config Table</h1>
        <form method="post" action="<?php echo $this->getUrl()->getUrl('ConfigGroup\Config', 'save', ['id' => $this->getRequest()->getGet('id')]) ?>">
        <input type="submit" class="btn" value="Update"> 
        
                <a class="btn" onclick="addRow()">Add Config</a> <br><br>
                
                <?php if(!$configs) : ?>
                    <table class="table" id="existingConfig">
                      <thead>
                        <tr>
                          <td>Title</td>
                          <td>Code</td>
                          <td>Value</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="4"></td>
                        </tr>
                      </tbody>
                    </table>    
                <?php else : ?>
                    <table class="table" id="existingConfig">
                        <thead>
                          <tr>
                            <td>Title</td>
                            <td>Code</td>
                            <td>Value</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                <?php foreach ($configs->getData() as $key => $config) : ?>
                        <tr>
                            <td><input type="text" name ="exist[<?php echo $config->config_id; ?>][title]" value="<?php echo $config->title; ?>"></td>
                            <td><input type="text" name ="exist[<?php echo $config->config_id; ?>][code]" value="<?php echo $config->code; ?>"></td>
                            <td><input type="text" name ="exist[<?php echo $config->config_id; ?>][value]" value="<?php echo $config->value; ?>"></td>
                            <td><a class="btn" name="removeConfig" href="<?php echo $this->geturl()->getUrl('ConfigGroup\config', 'delete', ['config_id' => $config->config_id, 'group_id' => $this->getRequest()->getGet('id')]); ?>">Remove</a></td>
                        </tr>
                <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>   
    </form>

    <div style="display:none">
        <table class="table" id="newConfig">
        
            <tr>
                <td><input type="text" name ="new[title][]" value=""></td>
                <td><input type="text" name ="new[code][]" value=""></td>
                <td><input type="text" name ="new[value][]" value=""></td>
                
                <td><a class="btn" onclick="removeRow(this)">Remove</a></td>
            </tr>
        </table>
    </div>
    
</body>
<script>

function addRow() {
   var newconfigTable = document.getElementById('newConfig');
   var existingconfigTable = document.getElementById('existingConfig').children[1];
   console.log(existingconfigTable);
   existingconfigTable.prepend(newconfigTable.children[0].children[0].cloneNode(true));
}

function removeRow(button) {
    var objTr = button.parentElement.parentElement;
    objTr.remove();
}

</script>


</html>