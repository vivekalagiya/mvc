<?php $customerGroups = $this->getCustomerGroup()->getData(); ?>
<?php $product = $this->getTableRow(); ?>

<form action="<?php echo $this->getUrl()->getUrl('Product\GroupPrice','save', ['id' => $this->getRequest()->getGet('id')]); ?>"  method="post">

<table class="table table-striped">
    <tr>
      <th>Group ID</th>
      <th>Group Name</th>
      <th>Price</th>
      <th>Group Price</th>
    </tr>
  <tbody>
      <?php if($customerGroups) : ?>
        <?php foreach($customerGroups as $key => $group) : ?>
          <?php $rowStatus = ($group->entity_id) ? 'exist' : 'new'; ?>
    <tr>
        <td><?php echo $group->group_id ?></td>
        <td><?php echo $group->groupName ?></td>
        <td><?php echo $group->price ?></td>
        <td><input type="text" name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $group->group_id ?>]" value="<?php echo $group->groupPrice ?>"></td>
    </tr>
    <?php endforeach; ?>
    <?php else : ?>
        <tr><td colspan="4">No group Found.</td></tr>
        <?php endif; ?>
  </tbody>
</table>
    <input type="button" class="btn" onclick="object.setForm(this).load();" value="Submit">
</form>

