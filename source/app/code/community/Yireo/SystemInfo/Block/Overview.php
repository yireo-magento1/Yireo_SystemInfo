<?php
/**
 * SystemInfo extension for Magento 
 *
 * @package     Yireo_SystemInfo
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright 2015 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

class Yireo_SystemInfo_Block_Overview extends Mage_Adminhtml_Block_Widget_Container
{
    /*
     * Constructor method
     */
    public function _construct()
    {
        $this->setTemplate('systeminfo/overview.phtml');
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
     * 
     */
    public function getModuleResult($module)
    {
        if(extension_loaded($module)) {
            return $this->__('Loaded');
        } else {
            return $this->__('Not available');
        }
    }

    public function getPhpVersion()
    {
        if(function_exists('phpversion')) {
            return phpversion();
        }
    }

    public function getWebserverVersion()
    {
        if(function_exists('apache_get_version')) {
            return 'Apache '.apache_get_version();
        }
        return 'unknown';
    }
}
