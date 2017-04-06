<?php


namespace JM\StoreLocator\Model;

use JM\StoreLocator\Api\Data\StoreLocatorInterface;

class StoreLocator extends \Magento\Framework\Model\AbstractModel implements StoreLocatorInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('JM\StoreLocator\Model\ResourceModel\StoreLocator');
    }

    /**
     * Get storelocator_id
     * @return string
     */
    public function getStorelocatorId()
    {
        return $this->getData(self::STORELOCATOR_ID);
    }

    /**
     * Set storelocator_id
     * @param string $storelocatorId
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    public function setStorelocatorId($storelocatorId)
    {
        return $this->setData(self::STORELOCATOR_ID, $storelocatorId);
    }

    /**
     * Get LocationName
     * @return string
     */
    public function getLocationName()
    {
        return $this->getData(self::LOCATIONNAME);
    }

    /**
     * Set LocationName
     * @param string $LocationName
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    public function setLocationName($LocationName)
    {
        return $this->setData(self::LOCATIONNAME, $LocationName);
    }

    /**
     * Get LongLat
     * @return string
     */
    public function getLongLat()
    {
        return $this->getData(self::LONGLAT);
    }

    /**
     * Set LongLat
     * @param string $LongLat
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    public function setLongLat($LongLat)
    {
        return $this->setData(self::LONGLAT, $LongLat);
    }

    /**
     * Get StoreAddress
     * @return string
     */
    public function getStoreAddress()
    {
        return $this->getData(self::STOREADDRESS);
    }

    /**
     * Set StoreAddress
     * @param string $StoreAddress
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    public function setStoreAddress($StoreAddress)
    {
        return $this->setData(self::STOREADDRESS, $StoreAddress);
    }

    /**
     * Get StorePhone
     * @return string
     */
    public function getStorePhone()
    {
        return $this->getData(self::STOREPHONE);
    }

    /**
     * Set StorePhone
     * @param string $StorePhone
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    public function setStorePhone($StorePhone)
    {
        return $this->setData(self::STOREPHONE, $StorePhone);
    }

    /**
     * Get StoreHours
     * @return string
     */
    public function getStoreHours()
    {
        return $this->getData(self::STOREHOURS);
    }

    /**
     * Set StoreHours
     * @param string $StoreHours
     * @return JM\StoreLocator\Api\Data\StoreLocatorInterface
     */
    public function setStoreHours($StoreHours)
    {
        return $this->setData(self::STOREHOURS, $StoreHours);
    }
}
