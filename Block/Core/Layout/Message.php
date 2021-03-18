<?php  
namespace Block\Core\Layout;

\Mage::loadFileByClassName('Block_Core_Template');

class Message extends \Block\Core\Template     
{
    public function __construct()
    {
        $this->setTemplate('View/core/layout/message.php');
    }
}

?>