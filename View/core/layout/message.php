<?php 
    $model = \Mage::getModel('Model\Admin\Message');
    $model->start();
?>
<?php if($this->getMessage()->getSuccess()) : ?>
<div class="success">
    <?php echo $this->getMessage()->getSuccess(); $this->getMessage()->clearSuccess(); ?>
</div>
<?php endif; ?>
<?php if($this->getMessage()->getFailure()) : ?>
<div class="failure">
    <?php echo $this->getMessage()->getFailure(); $this->getMessage()->clearFailure(); ?>
</div>
<?php endif; ?> 