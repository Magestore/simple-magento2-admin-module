<?php

namespace Magestore\Company\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Backend\Block\Widget\Grid\Column\Renderer\Options\Converter
     */
    protected $_converter;

    
    protected $_factory;

    

    /**
     * @var \Magento\Backend\Model\Session
     */
    protected $_backendSession;

    /**
     * @var array
     */
    protected $_sessionData = null;

    /**
     * @var \Magento\Backend\Helper\Js
     */
    protected $_backendHelperJs;

    /**
     * Block constructor.
     *
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magestore\Storelocator\Model\Factory $factory,
        \Magento\Backend\Block\Widget\Grid\Column\Renderer\Options\Converter $converter,
        \Magento\Backend\Helper\Js $backendHelperJs,
        \Magento\Backend\Model\Session $backendSession
      
    ) {
        parent::__construct($context);
        $this->_factory = $factory;
        $this->_converter = $converter;
      
        $this->_backendHelperJs = $backendHelperJs;
        $this->_backendSession = $backendSession;
    }

   
    public function getTreeSelectedValues()
    {
        
        $sessionData = $this->_getSessionData();

        if ($sessionData) {
            return $this->_converter->toTreeArray(
                $this->_backendHelperJs->decodeGridSerializedInput($sessionData)
            );
        }

        $entityType = $this->_getRequest()->getParam('entity_type');
        $id = $this->_getRequest()->getParam('enitity_id');

        /** @var \Magestore\Storelocator\Model\AbstractModelManageStores $model */
        $model = $this->_factory->create($entityType)->load($id);
        
        
       
       
        $methodGetterId = $this->_getRequest()->getParam('method_getter_id');

        /** @var \Magestore\Storelocator\Model\Store $store */
       
        $ids = $model->runGetterMethod($methodGetterId);

        return $model->getId() ? $this->_converter->toTreeArray($ids) : [];
    }

    /**
     * Get session data.
     *
     * @return array
     */
    protected function _getSessionData()
    {
        $serializedName = $this->_getRequest()->getParam('serialized_name');
        if ($this->_sessionData === null) {
            $this->_sessionData = $this->_backendSession->getData($serializedName, true);
        }

        return $this->_sessionData;
    }
}
