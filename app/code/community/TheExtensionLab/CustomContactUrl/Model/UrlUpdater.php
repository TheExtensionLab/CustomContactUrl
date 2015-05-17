<?php class TheExtensionLab_CustomContactUrl_Model_UrlUpdater
{
    const CONTACT_FRONTNAME_PATH = 'frontend/routers/contacts/args/frontName';
    const CONTACT_USE_CUSTOM_URL = 'contacts/contacts/use_custom';
    const CONTACT_CUSTOM_URL_PATH = 'contacts/contacts/custom_path';

    private $_newUrl;

    public function updateContactUrl()
    {
        if($this->_newCustomUrlConfigured())
        {
            $this->_getConfig()->setNode(
                self::CONTACT_FRONTNAME_PATH, $this->_newUrl
            );
        }
    }

    private function _newCustomUrlConfigured()
    {
        if($this->_useCustomUrlFlag()){
            $this->_newUrl = $this->_getCustomContactUrlPath();
        }

        if(!$this->_isValidUrlPath($this->_newUrl)){
            return false;
        }

        return true;
    }

    private function _isValidUrlPath()
    {
        return true;
    }

    private function _useCustomUrlFlag()
    {
        return Mage::getStoreConfigFlag(self::CONTACT_USE_CUSTOM_URL);
    }

    private function _getCustomContactUrlPath()
    {
        return Mage::getStoreConfig(self::CONTACT_CUSTOM_URL_PATH);
    }

    private function _getConfig()
    {
        return Mage::getConfig();
    }
}