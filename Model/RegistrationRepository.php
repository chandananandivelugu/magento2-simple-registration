<?php
namespace Test\Simpleregistration\Model;

use Test\Simpleregistration\Model\ResourceModel\Registration as ResourceRegistration;
use Test\Simpleregistration\Api\Data\RegistrationInterfaceFactory;
use Test\Simpleregistration\Api\RegistrationRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Test\Simpleregistration\Model\ResourceModel\Registration\CollectionFactory as RegistrationCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Test\Simpleregistration\Api\Data\RegistrationSearchResultsInterfaceFactory;

class RegistrationRepository implements RegistrationRepositoryInterface
{

    protected $dataObjectHelper;

    protected $dataRegistrationFactory;

    protected $dataObjectProcessor;

    protected $extensibleDataObjectConverter;
    protected $registrationCollectionFactory;

    protected $resource;

    private $collectionProcessor;

    protected $extensionAttributesJoinProcessor;

    private $storeManager;

    protected $registrationFactory;

    protected $searchResultsFactory;


    /**
     * @param ResourceRegistration $resource
     * @param RegistrationFactory $registrationFactory
     * @param RegistrationInterfaceFactory $dataRegistrationFactory
     * @param RegistrationCollectionFactory $registrationCollectionFactory
     * @param RegistrationSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceRegistration $resource,
        RegistrationFactory $registrationFactory,
        RegistrationInterfaceFactory $dataRegistrationFactory,
        RegistrationCollectionFactory $registrationCollectionFactory,
        RegistrationSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->registrationFactory = $registrationFactory;
        $this->registrationCollectionFactory = $registrationCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataRegistrationFactory = $dataRegistrationFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Test\Simpleregistration\Api\Data\RegistrationInterface $registration
    ) {
         $registrationData = $this->extensibleDataObjectConverter->toNestedArray(
            $registration,
            [],
            \Test\Simpleregistration\Api\Data\RegistrationInterface::class
        );
        
        $registrationModel = $this->registrationFactory->create()->setData($registrationData);
        
        try {
            $this->resource->save($registrationModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the registration: %1',
                $exception->getMessage()
            ));
        }
        return $registrationModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($registrationId)
    {
        $registration = $this->registrationFactory->create();
        $this->resource->load($registration, $registrationId);
        if (!$registration->getId()) {
            throw new NoSuchEntityException(__('Registration with id "%1" does not exist.', $registrationId));
        }
        return $registration->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->registrationCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Test\Simpleregistration\Api\Data\RegistrationInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Test\Simpleregistration\Api\Data\RegistrationInterface $registration
    ) {
        try {
            $registrationModel = $this->registrationFactory->create();
            $this->resource->load($registrationModel, $registration->getRegistrationId());
            $this->resource->delete($registrationModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Registration: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($registrationId)
    {
        return $this->delete($this->getById($registrationId));
    }
}
