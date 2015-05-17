<?php class TheExtensionLab_CustomContactUrl_Model_Observer
{
    public function controllerActionPredispatch(Varien_Event_Observer $observer)
    {
        $this->_getUpdater()->updateContactUrl();
    }

    private function _getUpdater()
    {
        return Mage::getModel('theextensionlab_customcontacturl/urlUpdater');
    }
}