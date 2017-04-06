<?php


namespace JM\StoreLocator\Api\Data;

interface StoreLocatorSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get StoreLocator list.
     * @return \JM\StoreLocator\Api\Data\StoreLocatorInterface[]
     */
    
    public function getItems();

    /**
     * Set LocationName list.
     * @param \JM\StoreLocator\Api\Data\StoreLocatorInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}
