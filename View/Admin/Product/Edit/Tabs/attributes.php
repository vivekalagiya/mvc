<?php $attributes = $this->getAttributes(); ?>
<?php //echo '<pre>'; print_r($attributes); ?>
    <form class="form" method="post" action="<?= $this->getUrl()->getUrl('Admin_Product_Attributes', 'save', ['id' => $this->getRequest()->getGet('id') ]) ?>">
    <table class="table">
     <?php foreach ($attributes as $key => $attribute) : ?>
    <?php //print_r($options = $attribute->getOptions()); ?>
    <?php $options = $attribute->getOptions(); ?>

        <?php if($attribute->inputType == 'select') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>    
                    <select class="form-control" name="<?= $attribute->name ?>" id="<?= $attribute->name ?>">
                        <?php foreach($options as $option) : ?>
                        <option name="<?= $attribute->name ?>[]" ><?= $option->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'text') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>    
                    <input class="form-control" type="text" name="<?= $attribute->name ?>" id="<?= $attribute->name ?>">
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'textarea') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>    
                    <textarea class="form-control" name="<?= $attribute->name ?>" id="<?= $attribute->name ?>"></textarea>
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'checkbox') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>  
                    <?php foreach ($options as $key => $option) : ?>
                        <input type="checkbox"  name="<?= $attribute->name ?>[<?= $option->option_id ?>]"  value="<?= $option->name ?>">
                        <label for="<?= $option->option_id ?>"><?= $option->name ?></label><br>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'radio') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>  
                    <?php foreach ($options as $key => $option) : ?>
                        <input type="radio"  name="<?= $attribute->name ?>" id="<?= $attribute->option_id ?>"  value="<?= $option->name ?>">
                        <label for="<?= $option->option_id ?>"><?= $option->name ?></label><br>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endif; ?>
        
        <?php endforeach; ?>
    </table>
    <br><input type="submit" class="btn" value="Submit">
    </form>




