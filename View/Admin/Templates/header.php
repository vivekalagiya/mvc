<?php $controller = \Mage::getController('Controller_Core_Admin');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-custom bg-primary">
  <div class="container-fluid">
    <ul class="nav navbar-nav"> 
      <li><a class="btn">E-COM APP</a></li>&nbsp;
      <li><a class="btn" href="">Home</a></li>&nbsp;
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_admin', 'index','',true) ?> >Admin</a></li>
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_customer', 'index','',true) ?> >Customer</a></li>
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_Customer_CustomerGroup', 'index','',true) ?> >Customer Group</a></li>
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_product', 'index','',true) ?> >Products</a></li>
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_category', 'index','',true) ?> >Category</a></li>
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_shipping', 'index','',true) ?> >Shipping Method</a></li>
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_payment', 'index','',true) ?> >Payment Method</a></li>
      <li><a class="btn" href=<?php echo $controller->getUrl('admin_attribute', 'index','',true) ?> >Attribute</a></li>
    </ul>
  </div>
</nav>
</body>


