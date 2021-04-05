<?php 
// echo '<pre>';
$products = $this->getproducts()->getData();
// print_r($_SESSION);
?>
<html>
<head>
    <title>Product Table</title>
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
        <div style = "display:flex">
           <div><h1>Product Table</h1></div>
           <div class="add"><a class="btn" href=<?php echo $this->getUrl()->getUrl('Product', 'edit'); ?>>Add Product</a></div>
        </div>     
        <table class="table" id="table1" name="table1">
            <thead class="thead">
                <tr>
                    
                    <th>Product_id</th>
                    <th>SKU</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>discount</th>
                    <th>quantity</th>
                    <th>description</th>
                    <th>Change status</th>
                    <th>created Date</th>
                    <th>updated Date</th>
                    <th colspan='2'>Action</th>
                    

                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $key => $product) { ?>
                        <tr>
                            <td><?php echo $product->product_id; ?></td>
                            <td><?php echo $product->sku; ?></td>
                            <td><?php echo $product->productName; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->discount; ?></td>
                            <td><?php echo $product->quantity; ?></td>
                            <td><?php echo $product->description; ?></td>
                            <td>
                                <?php if(!$product->status) { ?>    
                                    <a class="btn btn-success" href=<?php echo $this->getUrl()->getUrl('Product','status', ['id' => $product->product_id, 'status' => $product->status]); ?>>Enable</a></td>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Product','status', ['id' => $product->product_id, 'status' => $product->status]); ?>>Disable</a></td>
                                <?php } ?>
                            </td>
                            <td><?php echo $product->createdDate; ?></td>
                            <td><?php echo $product->updatedDate; ?></td>
                            <td><a class="btn btn-edit" href=<?php echo $this->getUrl()->getUrl('Product','edit', ['id' => $product->product_id]); ?> >edit</a></td>
                            <td><a class="btn btn-danger" href=<?php echo $this->getUrl()->getUrl('Product','delete', ['id' => $product->product_id]); ?>>delete</a></td>
                            <td><a class="btn btn-primary" href=<?php echo $this->getUrl()->getUrl('cart','addToCart', ['id' => $product->product_id]); ?>>Add To Cart</a></td>
                            
                        </tr>
              <?php }
                 ?>   
            </tbody>
        </table>

        
    </div>
    
</body>






<?php


/*

</html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>

$('.mydiv').click(function(){
    var id = $(this).data(id);
    alert($(this).data(id))
    var status = $(this).data(status);
console.log(id+status);
return false;
    $.confirm({
    title: 'Confirm!',
    content: 'Simple confirm!',
    buttons: {
        confirm: function () {
            $.ajax({
            url: '<?php echo $this->getUrl()->getUrl('Product','status', ['id' => $product->product_id, 'status' => $product->status]); ?>',
            data : {
                id : 1
            }
            dataType : 'json',
        });
        },
        cancel: function () {
            
        }
    }
});
});

</script>
 */

?>