<?php
namespace Test\Simpleregistration\Model\ResourceModel;

class Registration extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('test_simpleregistration_registration', 'registration_id');
    }
}
