<?php
/**
 * SystemInfo extension for Magento 
 *
 * @package     Yireo_SystemInfo
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright 2015 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

class Yireo_SystemInfo_Block_Events extends Mage_Adminhtml_Block_Widget_Container
{
    /*
     * Constructor method
     */
    public function _construct()
    {
        $this->setTemplate('systeminfo/events.phtml');
        parent::_construct();
    }

    /*
     * Helper to return the header of this page
     */
    public function getHeader($title = null)
    {
        return 'System Information - '.$this->__($title);
    }

    /*
     * Helper to return the menu
     */
    public function getMenu()
    {
        return $this->getLayout()->createBlock('systeminfo/menu')->toHtml();
    }

    /*
     * Return a list of observable events
     */
    protected function getEvents()
    {
        $results = array();
        $events = Mage::app()->getConfig()->getNode("global/events");
        foreach($events[0] as $eventName => $event) {
            foreach($event->observers[0] as $observer) {
                $class = (string)$observer->class[0];
                $class = Mage::app()->getConfig()->getModelClassName($class);
                if(preg_match('/^Mage_/', $class) == false) {
                    $results[$eventName.$class] = array(
                        'event' => $eventName,
                        'class' => $class,
                    );
                }
            }
        }

        ksort($results);
        return $results;
    }
}
