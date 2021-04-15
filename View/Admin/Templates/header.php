<?php $controller = \Mage::getController('Controller\Core\Admin');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/checkout.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>  
</head>
<body>

<nav class="navbar navbar-custom bg-primary">
  <div class="container-fluid">
    <ul class="nav navbar-nav"> 
      <li><a class="btn">E-COM APP</a></li>&nbsp;
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Index', 'index',[],true) ?>').load();" href="javascript:void(0);" >Home</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Admin', 'index',[],true) ?>').load();" href="javascript:void(0);" >Admin</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Customer', 'index',[],true) ?>').load();" href="javascript:void(0);" >Customer</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Customer\CustomerGroup', 'index',[],true) ?>').load();" href="javascript:void(0);" >Customer Group</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Brand', 'index',[],true) ?>').load();" href="javascript:void(0);" >Brand</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Product', 'index',[],true) ?>').load();" href="javascript:void(0);" >Products</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Category', 'index',[],true) ?>').load();" href="javascript:void(0);" >Category</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Shipping', 'index',[],true) ?>').load();" href="javascript:void(0);" >Shipping Method</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Payment', 'index',[],true) ?>').load();" href="javascript:void(0);" >Payment Method</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Cms', 'index',[],true) ?>').load();" href="javascript:void(0);" >Cms</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('Attribute', 'index',[],true) ?>').load();" href="javascript:void(0);" >Attribute</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('ConfigGroup', 'index',[],true) ?>').load();" href="javascript:void(0);" >Configuration</a></li>
      <li><a class="btn" onclick="object.setUrl('<?php echo $controller->getUrl('cart', 'index',[],true) ?>').load();" href="javascript:void(0);" >Go to Cart</a></li>
    </ul>
  </div>
</nav>
</body>


