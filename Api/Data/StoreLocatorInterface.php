<?php


namespace JM\StoreLocator\Api\Data;

interface StoreLocatorInterface
{

    const LOCATIONNAME = 'LocationName';
    const STOREHOURS = 'StoreHours';
    const STORELOCATOR_ID = 'storelocator_id';
    const LONGLAT = 'LongLat';
    const STOREPHONE = 'StorePhone';
    const STOREADDRESS = 'StoreAddress';


    /**
     * Get storelocator_id
     * @return string|null
     */
    
    public function getStorelocatorId();

    /**
     * Set storelocator_id
     * @param string $storelocator_id
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    
    public function setStorelocatorId($storelocatorId);

    /**
     * Get LocationName
     * @return string|null
     */
    
    public function getLocationName();

    /**
     * Set LocationName
     * @param string $LocationName
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    
    public function setLocationName($LocationName);

    /**
     * Get LongLat
     * @return string|null
     */
    
    public function getLongLat();

    /**
     * Set LongLat
     * @param string $LongLat
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    
    public function setLongLat($LongLat);

    /**
     * Get StoreAddress
     * @return string|null
     */
    
    public function getStoreAddress();

    /**
     * Set StoreAddress
     * @param string $StoreAddress
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    
    public function setStoreAddress($StoreAddress);

    /**
     * Get StorePhone
     * @return string|null
     */
    
    public function getStorePhone();

    /**
     * Set StorePhone
     * @param string $StorePhone
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    
    public function setStorePhone($StorePhone);

    /**
     * Get StoreHours
     * @return string|null
     */
    
    public function getStoreHours();

    /**
     * Set StoreHours
     * @param string $StoreHours
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    
    public function setStoreHours($StoreHours);
}
