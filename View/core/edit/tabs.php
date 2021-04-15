<?php //echo '<pre>'; var_dump($this->getRequest()->getGet('id')); ?>
<?php //echo '<pre>'; print_r($this->getTab('productMedia')); ?>
<?php $tabs = $this->getTabs(); ?>


<?php foreach ($tabs as $key => $tab) : ?>
    <?php if($key != $this->getDefaultTab()) : ?>
    <?php if($this->getRequest()->getGet('id')) : ?>
    <?php /*  <a class="btn" href="<?php echo $tab['url'] ?>"><?php echo $tab['label'] ?></a><br><br> */ ?>
    <button class="btn" onclick="object.setUrl('<?php echo $tab['url'] ?>').resetParams().load();"><?php echo $tab['label'] ?></button><br><br>
    <?php endif; ?>
    <?php else: ?>
    <?php /*  <a class="btn" href="<?php echo $tab['url'] ?>"><?php echo $tab['label'] ?></a><br><br> */ ?>
    <button class="btn" onclick="object.setUrl('<?php echo $tab['url'] ?>').resetParams().load();"><?php echo $tab['label'] ?></button><br><br>
    <?php endif; ?>
<?php endforeach; ?>

