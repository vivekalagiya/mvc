<?php $option = $this->getAttribute()->getOptions();?>
<?php //echo '<pre>'; print_r($option); ?>

<html>

<head>
    <title>Option Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
 
        <h1>Option Table</h1>
        <form method="post" action="<?php echo $this->getUrl()->getUrl('Admin_Attribute_Option', 'save', ['id' => $this->getRequest()->getGet('id')]) ?>">
        <input type="submit" class="btn" value="Update"> <br><br>
        
        
                <a class="btn" onclick="addRow()">Add Option</a> <br><br>
                <?php if(!$option) : ?>
                <a class="btn" onclick="addRow()">Add Option</a> <br><br>
                <?php else : ?>
                <?php foreach ($option as $key => $option) : ?>
                    <table class="table" id="existingOption">
                        <tbody>
                        <tr>
                            <td><input type="text" name ="exist[<?php echo $option->option_id; ?>][name]" value="<?php echo $option->name; ?>"></td>
                            <td><input type="text" name ="exist[<?php echo $option->option_id; ?>][sortOrder]" value="<?php echo $option->sortOrder; ?>"></td>
                            <td><a class="btn" name="removeOption" onclick="removeRow(this)">Remove</a></td>
                        </tr>
                        </tbody>
                    </table>
                <?php endforeach; ?>
                <?php endif; ?>   

    <div style="display:none">
        <table class="table" id="newOption">
            <tr>
                <td><input type="text" name ="new[][name]" value=""></td>
                <td><input type="text" name ="new[][sortOrder]" value=""></td>
                
                <td><a class="btn" onclick="removeRow(this)">Remove</a></td>
            </tr>
        </table>
    </div>
    
</body>
</form>
<script>

function addRow() {
   var newOptionTable = document.getElementById('newOption');
   var existingOptionTable = document.getElementById('existingOption').children[0];
   console.log(newOptionTable.children[0].children[0]);
   existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
}

function removeRow(button) {
    var objTr = button.parentElement.parentElement;
    objTr.remove();
}

</script>


</html>