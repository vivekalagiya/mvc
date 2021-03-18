<?php $tabs = $this->getTabs(); ?>


<?php foreach ($tabs as $key => $tab) : ?>
    <a class="btn btn-primary" href=<?php echo $tab['url'] ?>><?php echo $tab['label'] ?></a><br><br><br>
<?php endforeach; ?>

