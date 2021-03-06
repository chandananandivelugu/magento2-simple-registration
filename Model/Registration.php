<?php
namespace Test\Simpleregistration\Model;

use Magento\Framework\Api\DataObjectHelper;
use Test\Simpleregistration\Api\Data\RegistrationInterface;
use Test\Simpleregistration\Api\Data\RegistrationInterfaceFactory;

class Registration extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'test_simpleregistration_registration';
    protected $registrationDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param RegistrationInterfaceFactory $registrationDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Test\Simpleregistration\Model\ResourceModel\Registration $resource
     * @param \Test\Simpleregistration\Model\ResourceModel\Registration\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        RegistrationInterfaceFactory $registrationDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Test\Simpleregistration\Model\ResourceModel\Registration $resource,
        \Test\Simpleregistration\Model\ResourceModel\Registration\Collection $resourceCollection,
        array $data = []
    ) {
        $this->registrationDataFactory = $registrationDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve registration model with registration data
     * @return RegistrationInterface
     */
    public function getDataModel()
    {
        $registrationData = $this->getData();
        
        $registrationDataObject = $this->registrationDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $registrationDataObject,
            $registrationData,
            RegistrationInterface::class
        );
        
        return $registrationDataObject;
    }
}
