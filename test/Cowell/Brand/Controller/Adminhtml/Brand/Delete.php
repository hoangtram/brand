<?php


namespace Cowell\Brand\Controller\Adminhtml\Brand;

class Delete extends \Cowell\Brand\Controller\Adminhtml\Brand
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
        $id = $this->getRequest()->getParam('brand_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Cowell\Brand\Model\Brand');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Brand.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['brand_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Brand to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
