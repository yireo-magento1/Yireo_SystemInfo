<?php
/**
 * SystemInfo extension for Magento 
 *
 * @package     Yireo_SystemInfo
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright (C) 2014 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

class Yireo_SystemInfo_Block_Menu extends Mage_Core_Block_Template
{
    /*
     * Constructor method
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('systeminfo/menu.phtml');
    }

    /*
     * Helper method to get a list of the menu-items
     */
    public function getMenuItems()
    {
        // Build the list of menu-items
        $items = array(
            array(
                'action' => 'index',
                'title' => 'Overview',
            ),
            array(
                'action' => 'phpinfo',
                'title' => 'PHP Info',
            ),
            array(
                'action' => 'overrides',
                'title' => 'XML-overrides',
            ),
            array(
                'action' => 'events',
                'title' => 'Events',
            ),
        );

        $url = Mage::getModel('adminhtml/url');
        $current_action = $this->getRequest()->getActionName();

        foreach($items as $index => $item) {

            if($item['action'] == $current_action) {
                $item['class'] = 'active';
            } else {
                $item['class'] = 'inactive';
            }
        
            $item['url'] = $url->getUrl('systeminfo/index/'.$item['action']);

            $items[$index] = $item;
        }

        return $items;
    }
}
