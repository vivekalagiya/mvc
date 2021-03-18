<?php $shipping = $this->getShipping(); ?>
<?php $billing = $this->getBilling(); ?>
<?php //echo '<pre>'; print_r($shipping->getData()); die;  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Customer Addresses</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <form class="form" name='form' method="POST" action="<?php echo $this->getUrl()->getUrl('Admin_Customer_CustomerAddresses', 'save', ['id' => $this->getRequest()->getGet('id')]) ?>">
  <table>
        <tr>
          <td colspan="2"><h2>Shipping Address</h2></td>
        </tr>
  	  	<tr class="form-group">
            <td><label>Address</label></td>
            <td>
                <textarea class="form-control" name="shipping[address]" value="<?php echo $shipping->address ?>" required><?php echo $shipping->address ?></textarea>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>City</label></td>
            <td>
                <input type="text" class="form-control" name="shipping[city]" value="<?php echo $shipping->city ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>State</label></td>
            <td>
                <input type="text" class="form-control" name="shipping[state]" value="<?php echo $shipping->state ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Zip-Code</label></td>
            <td>
                <input type="text" class="form-control" name="shipping[zipcode]" value="<?php echo $shipping->zipcode ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Country</label></td>
            <td>
                <input type="text" class="form-control" name="shipping[country]" value="<?php echo $shipping->country ?>"  required>
            </td>
  	    </tr>
    </table>
    
    <table>
        <tr>
          <td colspan="2"><h2>Billing Address</h2></td>
        </tr>
  	  	<tr class="form-group">
            <td><label>Address</label></td>
            <td>
                <textarea class="form-control" name="billing[address]" value="<?php echo $billing->address ?>" required><?php echo $billing->address ?></textarea>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>City</label></td>
            <td>
                <input type="text" class="form-control" name="billing[city]" value="<?php echo $billing->city ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>State</label></td>
            <td>
                <input type="text" class="form-control" name="billing[state]" value="<?php echo $billing->state ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Zip-Code</label></td>
            <td>
                <input type="text" class="form-control" name="billing[zipcode]" value="<?php echo $billing->zipcode ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Country</label></td>
            <td>
                <input type="text" class="form-control" name="billing[country]" value="<?php echo $billing->country ?>"  required>
            </td>
  	    </tr>
    </table>
         <br><button type="submit" class="btn" >Save</button>
  </form>
</body>
    
</html>