<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cowell\Brand\Controller\Adminhtml\Index;

/**
 * Description of Save
 *
 * @author Tram
 */
class Save extends \Magento\Backend\App\Action{
    protected $dataPersistor;
    protected $uploaderPool;
    
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Cowell\Brand\Model\UploaderPool $uploaderPool,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->uploaderPool = $uploaderPool;
        parent::__construct($context);
    }
    
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('brand_id');
        
            $model = $this->_objectManager->create('Cowell\Brand\Model\Brands')->load($id);
            if (!$model->getBrandId() && $id) {
                $this->messageManager->addErrorMessage(__('This Brand no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            $image = $this->getUploader('image')->uploadFileAndGetName('src', $data);
            $data['src'] = $image;
            $model->setData($data);
            
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Brand.'));
                $this->dataPersistor->clear('cowell_brand_brand');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['brand_id' => $model->getBrandId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Brand.'));
            }
        
            $this->dataPersistor->set('cowell_brand_brand', $data);
            return $resultRedirect->setPath('*/*/edit', ['brand_id' => $this->getRequest()->getParam('brand_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
    
    protected function getUploader($type)
    {
        return $this->uploaderPool->getUploader($type);
    }
}
