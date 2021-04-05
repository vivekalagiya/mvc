<?php $images = $this->getImage(); ?>


<form action="<?php echo $this->getUrl()->getUrl('Product\ProductMedia','save', ['id' => $this->getRequest()->getGet('id')]); ?>"  method="post">
<input type="submit" class="btn" value="Update" </a>
<input type="submit" class="btn" value="Remove" </a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Label</th>
      <th scope="col">Small</th>
      <th scope="col">Thumb</th>
      <th scope="col">Base</th>
      <th scope="col">Galary</th>
      <th scope="col">Remove</th>
    </tr>
  </thead>
  <tbody>
      <?php if($images) : ?>
        <?php foreach($images->getData() as $key => $image) : ?>
    <tr>
        <td><img src="skin\Images\Product\<?php echo $image->image; ?>" width="100"></td>
        <td><input type="text" name="image[data][<?php echo $image->image_id ?>][label]" value=""></td>
        <td><input type="radio" name="image[small]" value="<?php echo $image->image_id; ?>"></td>
        <td><input type="radio" name="image[thumb]" value="<?php echo $image->image_id; ?>"></td>
        <td><input type="radio" name="image[base]" value="<?php echo $image->image_id; ?>"></td>
        <td><input type="checkbox" name="image[data][<?php echo $image->image_id ?>][gallery]" value="<?php echo $image->image_id; ?>"></td>
        <td><input type="checkbox" name="image[data][<?php echo $image->image_id ?>][remove]" value="<?php echo $image->image_id; ?>"></td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>
        <tr><td colspan="7">No image Found.</td></tr>
        <?php endif; ?>
  </tbody>
</table>
</form>
<div>
    <form class="form" action="<?php echo $this->getUrl()->getUrl('Product\ProductMedia','save', ['id' => $this->getRequest()->getGet('id')]); ?>" enctype="multipart/form-data" method="post">
        <div>
            <input type="file" class="btn" name="image"><br>
            <input type="submit" class="btn" name="upload" value="upload">
        </div>
    </form>
</div>

</form>

<script>
    function submitForm(button) {
        var form = $(button).closest('form');
        form.attr('action',"<?php echo $this->getUrl()->getUrl('Product\ProductMedia', 'save')?>");
        form.submit();
        e.preventDefault();
    }
</script>