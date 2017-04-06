<?php


namespace JM\StoreLocator\Controller\Adminhtml\StoreLocator;

class Delete extends \JM\StoreLocator\Controller\Adminhtml\StoreLocator
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('storelocator_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('JM\StoreLocator\Model\StoreLocator');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You deleted the Storelocator.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['storelocator_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a Storelocator to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
