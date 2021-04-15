<?php $payment = $this->getPayment(); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Payment</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
  <div class="head">
  	<h2>Edit Payment</h2>
  </div>
	
  <form class="form" name='payment[form]' method="POST" action="<?php echo $this->getUrl()->getUrl('Payment', 'save', ['id' => $payment->payment_id ]) ?>" >
    <table>
      
        
          <tr class="form-group">
            <td><label>Payment Name</label></td>
            <td>
                <input class="form-control" type="text" name="payment[paymentName]" value="<?php echo $payment->paymentName ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Code</label></td>
            <td>
                <input class="form-control" type="text" name="payment[code]" value="<?php echo $payment->code ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Description</label></td>
            <td><textarea class="form-control" name="payment[description]" ><?php echo $payment->description ?></textarea>
            </td>
        </tr>
        <tr class="form-group">
            <td><label for="status">Status</label></td>
            <td>
              <select class="form-control" name="payment[status]" id="status">
                <option value="enabled" <?php if($payment->status == 1) { ?> selected <?php } ?>>Enabled</option> 
                <option value="disabled" <?php if($payment->status == 0) { ?> selected <?php } ?>>Disabled</option>
              </select>
            </td>
  	    </tr>
        
        
        
    </table>
               
         <input type="button"   class="btn" onclick="object.setForm(this).load();" value="Save">

  </form>
</body>
    
</html>