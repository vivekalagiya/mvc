<?php

namespace Controller\Admin;

class Index extends \Controller\Core\Admin 
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->setTemplate('View/Core/layout/one_column.php');
        // $content = $layout->getContent();
        // $grid = \Mage::getBlock('Block\Dashboard\Dashboard');
        // $content->addChild($grid, 'grid');
        $this->renderLayout();
    }
}

?>
