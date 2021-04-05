<?php $attributes = $this->getAttributes()->getData(); ?>
<?php //echo '<pre>'; print_r($this->getValue()); ?>
    <form class="form" method="post" action="<?= $this->getUrl()->getUrl('Product\Attributes', 'save', ['id' => $this->getRequest()->getGet('id') ]) ?>">
    <table class="table">
     <?php foreach ($attributes as $key => $attribute) : ?>
    <?php //print_r($options = $attribute->getOptions()); ?>
    <?php $options = $attribute->getOptions(); ?>

        <?php if($attribute->inputType == 'select') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>    
                    <select class="form-control" name="<?= $attribute->name ?>" id="<?= $attribute->name ?>">
                        <?php foreach($options->getData() as $option) : ?>
                        <option name="<?= $attribute->name ?>[]" <?php  if($this->getValue($attribute->name) == $option->name) : ?> selected <?php endif; ?>><?= $option->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'text') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>    
                    <input class="form-control" type="text" name="<?= $attribute->name ?>" id="<?= $attribute->name ?>" value="<?= $this->getValue($attribute->name) ?>">
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'textarea') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>    
                    <textarea class="form-control" name="<?= $attribute->name ?>" id="<?= $attribute->name ?>"><?= $this->getValue($attribute->name) ?></textarea>
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'checkbox') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>  
                    <?php foreach ($options->getData() as $key => $option) : ?>
                        <input type="checkbox"  name="<?= $attribute->name ?>[<?= $option->option_id ?>]"  value="<?= $option->name ?>" <?php  if(strpos($this->getValue($attribute->name), $option->name) === false) : else : ?> checked <?php endif; ?>>
                        <label for="<?= $attribute->name ?>[<?= $option->option_id ?>]"><?= $option->name ?></label><br>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endif; ?>

        <?php if($attribute->inputType == 'radio') : ?>
            <tr class="form-group">
                <td><label><?= $attribute->name ?></label></td>
                <td>  
                    <?php foreach ($options->getData() as $key => $option) : ?>
                        <input type="radio"  name="<?= $attribute->name ?>" id="<?= $attribute->option_id ?>"  value="<?= $option->name ?>" <?php  if($this->getValue($attribute->name) == $option->name) : ?> checked <?php endif; ?>>
                        <label for="<?= $option->option_id ?>" ><?= $option->name ?></label><br>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endif; ?>
        
        <?php endforeach; ?>
    </table>
    <br><input type="submit" class="btn" value="Submit">
    </form>




