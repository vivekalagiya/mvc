<?php $option = $this->getAttribute()->getOptions();?>
<?php // echo '<pre>'; print_r($option); ?>

<html>

<head>
    <title>Option Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Option Table</h1>
        <form method="post" action="<?php echo $this->getUrl()->getUrl('Attribute\Option', 'save', ['id' => $this->getRequest()->getGet('id')]) ?>">
         <input type="button" class="btn" onclick="object.setForm(this).load();" value="Update">
        
                <a class="btn" onclick="addRow()">Add Option</a> <br><br>
                <?php if(!$option) : ?>
                    <table class="table" id="existingOption">
                      <thead>
                        <tr>
                          <td>option</td>
                          <td>Sort Order</td>
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
                    <table class="table" id="existingOption">
                    <thead>
                          <tr>
                            <td>Option</td>
                            <td>Sort Order</td>
                            <td>Action</td>
                          </tr>
                        </thead>
                        <tbody>
                <?php foreach ($option->getData() as $key => $option) : ?>
                        <tr>
                            <td><input type="text" name ="exist[<?php echo $option->option_id; ?>][name]" value="<?php echo $option->name; ?>"></td>
                            <td><input type="text" name ="exist[<?php echo $option->option_id; ?>][sortOrder]" value="<?php echo $option->sortOrder; ?>"></td>
                            <td><a class="btn btn-danger" name="removeOption" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('Attribute\Option', 'delete', ['option_id' => $option->option_id, 'attribute_id' => $this->getRequest()->getGet('id')]); ?>').load()" href="javascript:void(0)" >Remove</a></td>
                        </tr>
                <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>   
    </form>

    <div style="display:none">
        <table class="table" id="newOption">
            <tr>
                <td><input type="text" name ="new[name][]" value=""></td>
                <td><input type="text" name ="new[sortOrder][]" value=""></td>
                
                <td><a class="btn btn-danger" onclick="removeRow(this)">Remove</a></td>
            </tr>
        </table>
    </div>
    
</body>
<script>

function addRow() {
   var newOptionTable = document.getElementById('newOption');
   var existingOptionTable = document.getElementById('existingOption').children[1];
   existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
}

function removeRow(button) {
    var objTr = button.parentElement.parentElement;
    objTr.remove();
}

</script>


</html>