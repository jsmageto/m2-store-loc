<?php


namespace JM\StoreLocator\Controller\Adminhtml\StoreLocator;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('storelocator_id');
        
            $model = $this->_objectManager->create('JM\StoreLocator\Model\StoreLocator')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This Storelocator no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the Storelocator.'));
                $this->dataPersistor->clear('jm_storelocator_storelocator');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['storelocator_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Storelocator.'));
            }
        
            $this->dataPersistor->set('jm_storelocator_storelocator', $data);
            return $resultRedirect->setPath('*/*/edit', ['storelocator_id' => $this->getRequest()->getParam('storelocator_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
