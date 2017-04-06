<?php


namespace JM\StoreLocator\Model;

use JM\StoreLocator\Api\Data\StoreLocatorInterfaceFactory;
use JM\StoreLocator\Api\StoreLocatorRepositoryInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use JM\StoreLocator\Model\ResourceModel\StoreLocator as ResourceStoreLocator;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SortOrder;
use JM\StoreLocator\Api\Data\StoreLocatorSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use JM\StoreLocator\Model\ResourceModel\StoreLocator\CollectionFactory as StoreLocatorCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Store\Model\StoreManagerInterface;

class StoreLocatorRepository implements StoreLocatorRepositoryInterface
{

    protected $dataObjectHelper;

    protected $StoreLocatorFactory;

    protected $searchResultsFactory;

    private $storeManager;

    protected $StoreLocatorCollectionFactory;

    protected $resource;

    protected $dataObjectProcessor;

    protected $dataStoreLocatorFactory;


    /**
     * @param ResourceStoreLocator $resource
     * @param StoreLocatorFactory $storeLocatorFactory
     * @param StoreLocatorInterfaceFactory $dataStoreLocatorFactory
     * @param StoreLocatorCollectionFactory $storeLocatorCollectionFactory
     * @param StoreLocatorSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceStoreLocator $resource,
        StoreLocatorFactory $storeLocatorFactory,
        StoreLocatorInterfaceFactory $dataStoreLocatorFactory,
        StoreLocatorCollectionFactory $storeLocatorCollectionFactory,
        StoreLocatorSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->storeLocatorFactory = $storeLocatorFactory;
        $this->storeLocatorCollectionFactory = $storeLocatorCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataStoreLocatorFactory = $dataStoreLocatorFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \JM\StoreLocator\Api\Data\StoreLocatorInterface $storeLocator
    ) {
        /* if (empty($storeLocator->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $storeLocator->setStoreId($storeId);
        } */
        try {
            $this->resource->save($storeLocator);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the storeLocator: %1',
                $exception->getMessage()
            ));
        }
        return $storeLocator;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($storeLocatorId)
    {
        $storeLocator = $this->storeLocatorFactory->create();
        $storeLocator->load($storeLocatorId);
        if (!$storeLocator->getId()) {
            throw new NoSuchEntityException(__('StoreLocator with id "%1" does not exist.', $storeLocatorId));
        }
        return $storeLocator;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $collection = $this->storeLocatorCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $items = [];
        
        foreach ($collection as $storeLocatorModel) {
            $storeLocatorData = $this->dataStoreLocatorFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $storeLocatorData,
                $storeLocatorModel->getData(),
                'JM\StoreLocator\Api\Data\StoreLocatorInterface'
            );
            $items[] = $this->dataObjectProcessor->buildOutputDataArray(
                $storeLocatorData,
                'JM\StoreLocator\Api\Data\StoreLocatorInterface'
            );
        }
        $searchResults->setItems($items);
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \JM\StoreLocator\Api\Data\StoreLocatorInterface $storeLocator
    ) {
        try {
            $this->resource->delete($storeLocator);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the StoreLocator: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($storeLocatorId)
    {
        return $this->delete($this->getById($storeLocatorId));
    }
}
