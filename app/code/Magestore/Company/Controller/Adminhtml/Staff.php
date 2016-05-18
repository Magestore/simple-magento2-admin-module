<?php

namespace Magestore\Company\Controller\Adminhtml;

abstract class Staff extends \Magestore\Company\Controller\Adminhtml\AbstractAction
{
    const PARAM_CRUD_ID = 'staff_id';

    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestore_Company::company_staff');
    }
}