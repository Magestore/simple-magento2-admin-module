<?php


namespace Magestore\Company\Model\ResourceModel\Staff;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'staff_id';

    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init('Magestore\Company\Model\Staff', 'Magestore\Company\Model\ResourceModel\Staff');
    }
}
