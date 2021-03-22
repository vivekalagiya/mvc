<?php //echo '<pre>'; var_dump($this->getRequest()->getGet('id')); ?>
<?php //echo '<pre>'; print_r($this->getTab('productMedia')); ?>
<?php $tabs = $this->getTabs(); ?>

<?php foreach ($tabs as $key => $tab) : ?>
    <?php if($key != 'categoryInformation') : ?>
    <?php if($this->getRequest()->getGet('id')) : ?>
    <a class="btn" href="<?php echo $tab['url'] ?>"><?php echo $tab['label'] ?></a><br><br>
    <?php endif; ?>
    <?php else: ?>
    <a class="btn" href="<?php echo $tab['url'] ?>"><?php echo $tab['label'] ?></a><br><br>
    <?php endif; ?>
<?php endforeach; ?>

