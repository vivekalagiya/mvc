<table width='100%' >
<tbody>
    <tr>
        <td height='100px' colspan='3'><?php require_once 'View/Admin/Templates/header.php' ?></td>
    </tr>
    <tr>
        <td style="background-color:rgba(0,0,0,0.2)" height='500px' width='20%'><?php echo $this->getChild('leftBar')->toHtml(); ?></td>
        <td>
            <?php  echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?>
            <?php echo $this->getContent()->toHtml(); ?>
        </td>
    </tr>
    <tr>
        <td height='100px' colspan='3'><?php require_once 'View/Admin/Templates/footer.php' ?></td>
    </tr>
</tbody>
</table>        