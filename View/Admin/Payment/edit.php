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
	
  <form class="form" name='payment[form]' method="POST" action="<?php echo $this->getUrl()->getUrl('Admin_payment', 'save', ['id' => $payment->payment_id ]) ?>" >
    <table>
      
        
          <tr class="form-group">
            <td><label>Payment Name</label></td>
            <td>
                <input type="text" name="payment[paymentName]" value="<?php echo $payment->paymentName ?>" required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Code</label></td>
            <td>
                <input type="text" name="payment[code]" value="<?php echo $payment->code ?>"  required>
            </td>
  	    </tr>
          <tr class="form-group">
            <td><label>Description</label></td>
            <td><textarea name="payment[description]" ><?php echo $payment->description ?></textarea>
            </td>
        </tr>
        <tr class="form-group">
            <td><label for="status">Status</label></td>
            <td>
              <select name="payment[status]" id="status">
                <option value="enabled" <?php if($payment->status == 1) { ?> selected <?php } ?>>Enabled</option> 
                <option value="disabled" <?php if($payment->status == 0) { ?> selected <?php } ?>>Disabled</option>
              </select>
            </td>
  	    </tr>
        
        
        
    </table>
               
             
         <button type="submit" class="btn" >Save</button>

  </form>
</body>
    
</html>