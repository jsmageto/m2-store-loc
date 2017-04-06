<?php


namespace JM\StoreLocator\Model\ResourceModel\StoreLocator;

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
            'JM\StoreLocator\Model\StoreLocator',
            'JM\StoreLocator\Model\ResourceModel\StoreLocator'
        );
    }
}
