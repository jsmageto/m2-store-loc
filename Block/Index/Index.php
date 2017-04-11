<?php


namespace JM\StoreLocator\Block\Index;
use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{
	
    protected $storeCollectionFactory;

    public function __construct(
        Template\Context $context,
    
        \JM\StoreLocator\Model\ResourceModel\StoreLocator\CollectionFactory $storeCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->storeCollectionFactory = $storeCollectionFactory;
    }

	
	public function getStoreLocations()
	{
		$stores = $this->storeCollectionFactory->create();
		
		return $stores->getData();
	}
}
