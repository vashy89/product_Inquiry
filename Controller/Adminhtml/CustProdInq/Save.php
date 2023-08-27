<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Controller\Adminhtml\CustProdInq;

use Magento\Framework\Exception\LocalizedException;
use Pwc\ProductInquiry\Model\CustProdInqFactory;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;

class Save extends \Magento\Backend\App\Action
{

    /**
     * @var object
     */
    protected $dataPersistor;
    
    /**
     * @var object
     */
    protected $_custProdInqFactory;

    /**
     * @var object
     */
    protected $transportBuilder;
    /**
     * @var object
     */
    protected $storeManager;
    /**
     * @var object
     */
    protected $inlineTranslation;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        CustProdInqFactory $custProdInqFactory,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        TransportBuilder $transportBuilder,
        StoreManagerInterface $storeManager,
        StateInterface $inlineTranslation
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->_custProdInqFactory = $custProdInqFactory;
        $this->transportBuilder = $transportBuilder;
        $this->storeManager = $storeManager;
        $this->inlineTranslation = $inlineTranslation;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();

        if (!$data) {
            $resultRedirect->setPath('*/*/');
            $this->messageManager->addErrorMessage(__('No Data Found.'));
            return;
        }
        
        if($this->getRequest()->getParam('admin_reply') != null)
        {
            $message = $this->getRequest()->getParam('admin_reply');
            $recipient = $this->getRequest()->getParam('email');
            try {
                $storeId = $this->storeManager->getStore()->getId();
                $transport = $this->transportBuilder
                    ->setTemplateIdentifier('hello_template')
                    ->setTemplateOptions([
                        'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                        'store' => $storeId,
                    ])
                    ->setTemplateVars([
                        'message' => $message,
                    ])
                    ->setFrom('general')
                    ->addTo($recipient)
                    ->getTransport();

                $transport->sendMessage();
                $this->inlineTranslation->resume();
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while sending reply email.'));
            }

            $data['reply'] = date('Y-m-d H:i:s');
        }

        $custProdInqFactory = $this->_custProdInqFactory->create();
        try 
        {
            $custProdInqFactory->setData($data)->save();
            
            $this->messageManager->addSuccessMessage(__('Inquiry Saved.'));
            $this->dataPersistor->clear('pwc_productinquiry_custprodinq');

            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['custprodinq_id' => $model->getId()]);
            }
            return $resultRedirect->setPath('*/*/');
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Inquiry.'));
        }
    
        $this->dataPersistor->set('pwc_productinquiry_custprodinq', $data);
        return $resultRedirect->setPath('*/*/edit', ['custprodinq_id' => $this->getRequest()->getParam('custprodinq_id')]);

        return $resultRedirect->setPath('*/*/');
    }
}

