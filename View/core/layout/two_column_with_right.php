<table width='100%' border='1'>
<tbody>
    <tr>
        <td height='100px' colspan='3'><?php require_once 'View/Admin/Templates/header.php' ?></td>
    </tr>
    <tr>
    <?php  echo $this->createBlock('Block_Core_Layout_Message')->toHtml(); ?>
        <td><?php echo $this->getContent()->toHtml(); ?></td>
        <td height='500px' width='20%'>2</td>
    </tr>
    <tr>
        <td height='100px' colspan='3'><?php require_once 'View/Admin/Templates/footer.php' ?></td>
    </tr>
</tbody>
</table>