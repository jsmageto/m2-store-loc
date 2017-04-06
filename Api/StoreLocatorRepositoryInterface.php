<?php


namespace JM\StoreLocator\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface StoreLocatorRepositoryInterface
{


    /**
     * Save StoreLocator
     * @param \JM\StoreLocator\Api\Data\StoreLocatorInterface $storeLocator
     * @return \JM\StoreLocator\Api\Data\StoreLocatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function save(
        \JM\StoreLocator\Api\Data\StoreLocatorInterface $storeLocator
    );

    /**
     * Retrieve StoreLocator
     * @param string $storelocatorId
     * @return \JM\StoreLocator\Api\Data\StoreLocatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getById($storelocatorId);

    /**
     * Retrieve StoreLocator matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \JM\StoreLocator\Api\Data\StoreLocatorSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete StoreLocator
     * @param \JM\StoreLocator\Api\Data\StoreLocatorInterface $storeLocator
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function delete(
        \JM\StoreLocator\Api\Data\StoreLocatorInterface $storeLocator
    );

    /**
     * Delete StoreLocator by ID
     * @param string $storelocatorId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function deleteById($storelocatorId);
}
