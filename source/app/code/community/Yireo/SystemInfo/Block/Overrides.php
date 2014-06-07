<?php
/**
 * SystemInfo extension for Magento 
 *
 * @package     Yireo_SystemInfo
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright (C) 2014 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

class Yireo_SystemInfo_Block_Overrides extends Mage_Adminhtml_Block_Widget_Container
{
    /*
     * Constructor method
     */
    public function _construct()
    {
        $this->setTemplate('systeminfo/overrides.phtml');
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
     * Return a list of all the existing overrides
     */
    protected function getOverrides($type = null)
    {
        $overrides = array();
        $modules = Mage::app()->getConfig()->getNode("global/$type");
        foreach($modules[0] as $name => $config) {
            if(!$config->rewrite) { continue; }
            foreach($config->rewrite[0] as $rewrite => $node) {
                $overrides[$name.'/'.$rewrite.$node] = array(
                    'reference' => $name.'/'.$rewrite,
                    'node' => $node,
                );
            }
        }

        ksort($overrides);
        return $overrides;
    }
}
