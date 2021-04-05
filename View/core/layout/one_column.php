
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div height='100px'><?php require_once 'View/Admin/Templates/header.php' ?></div>


<table width='100%' >
<tbody>
<tr>
    <td>
        <?php  echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?>
    </td>
</tr>
    <tr>
        <td height='500px'><?php echo $this->getContent()->toHtml(); ?></td>
    </tr>
</tbody>
</table>
<div height='100px'><?php require_once 'View/Admin/Templates/footer.php' ?></div>