<?php

namespace Magestore\Company\Ui\DataProvider;

use Magestore\Company\Model\ResourceModel\Staff\CollectionFactory;

/**
 * Class ProductDataProvider
 */

class StaffDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;


    protected $addFieldStrategies;

    protected $addFilterStrategies;

    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->addFieldStrategies = $addFieldStrategies;
        $this->addFilterStrategies = $addFilterStrategies;
    }

   

}
