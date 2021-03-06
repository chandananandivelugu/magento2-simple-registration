<?php
namespace Test\Simpleregistration\Model\ResourceModel\Registration;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Test\Simpleregistration\Model\Registration::class,
            \Test\Simpleregistration\Model\ResourceModel\Registration::class
        );
    }
}
