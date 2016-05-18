<?php

namespace Magestore\Company\Model\ResourceModel;


class Staff extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * construct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magestore_company_staffs', 'staff_id');
    }
}
