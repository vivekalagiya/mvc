<table width='100%' border='1'>
<tbody>
    <tr>
        <td height='100px' colspan='3'><?php require_once 'View/Admin/Templates/header.php' ?></td>
    </tr>
    <tr>
        <td>
            <?php  echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?>
        </td>
    </tr>
    <tr>
        <td height='500px' width='15%'>2</td>
        <td><pre><?php echo $this->getContent()->toHtml(); ?></pre></td>
        <td width='15%'>4</td>
    </tr>
    <tr>
        <td height='100px' colspan='3'><?php require_once 'View/Admin/Templates/footer.php' ?></td>
    </tr>
</tbody>
</table>