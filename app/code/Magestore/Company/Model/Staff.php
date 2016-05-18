<?php



namespace Magestore\Company\Model;


class Staff extends \Magento\Framework\Model\AbstractModel
{
   
    protected $_staffCollectionFactory;

   
    protected $_storeViewId = null;

    
    protected $_staffFactory;

   
    protected $_formFieldHtmlIdPrefix = 'page_';

    
    protected $_storeManager;

   
    protected $_monolog;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magestore\Company\Model\ResourceModel\Staff $resource,
        \Magestore\Company\Model\ResourceModel\Staff\Collection $resourceCollection,
        \Magestore\Company\Model\StaffFactory $staffFactory,
        
        \Magestore\Company\Model\ResourceModel\Staff\CollectionFactory $staffCollectionFactory,
    
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Logger\Monolog $monolog
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection
        );
        $this->_staffFactory = $staffFactory;
       
      
        $this->_storeManager = $storeManager;
        $this->_staffCollectionFactory = $staffCollectionFactory;

        $this->_monolog = $monolog;

        if ($storeViewId = $this->_storeManager->getStore()->getId()) {
            $this->_storeViewId = $storeViewId;
        }
    }

   

    
}
