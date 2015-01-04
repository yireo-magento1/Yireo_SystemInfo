<?php
/**
 * SystemInfo extension for Magento 
 *
 * @package     Yireo_SystemInfo
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright 2015 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

/**
 * SystemInfo admin controller
 *
 * @category   SystemInfo
 * @package     Yireo_SystemInfo
 */
class Yireo_SystemInfo_IndexController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Common method
     */
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('system/tools/systeminfo')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('System'), Mage::helper('adminhtml')->__('System'))
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Tools'), Mage::helper('adminhtml')->__('Tools'))
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('System Information'), Mage::helper('adminhtml')->__('System Information'))
        ;
        return $this;
    }

    /**
     * Overview page
     */
    public function indexAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('systeminfo/overview'))
            ->renderLayout();
    }

    /**
     * PHP Info page
     */
    public function phpinfoAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('systeminfo/phpinfo'))
            ->renderLayout();
    }

    /**
     * Overrides page
     */
    public function overridesAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('systeminfo/overrides'))
            ->renderLayout();
    }

    /**
     * Overrides page
     */
    public function eventsAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('systeminfo/events'))
            ->renderLayout();
    }
}
