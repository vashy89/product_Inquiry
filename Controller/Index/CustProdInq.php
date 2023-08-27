<?php
/*
 * @category  Pwc
 * @package   Pwc_ProductInquiry
 * @author    Vashishtha Chauhan
 */
namespace Pwc\ProductInquiry\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;
use Pwc\ProductInquiry\Model\CustProdInqFactory;


/** 
 * Customer's inquires controller
 */
class CustProdInq extends Action
{
    /**
     * @var $resultJsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var object
     */
    protected $_custProdInqFactory;

    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        CustProdInqFactory $custProdInqFactory
    ) 
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_custProdInqFactory = $custProdInqFactory;
        parent::__construct($context);
    }

    /** 
     * Add customer's inquires
     * 
     * @return json 
     */
    public function execute()
    {
        $post_data = $this->getRequest()->getPostValue();
        try {
            $custProdInqFactory = $this->_custProdInqFactory->create();
            $custProdInqFactory->setData($post_data);
            $custProdInqFactory->save();
            $this->messageManager->addSuccess(__("Save Data"));
        } catch (\Exception $e) {
            $this->messageManager->addError(__('please try again. Form Not Submit'));
        }

        $result = $this->resultJsonFactory->create();
        return $result->setData(['message' => 'Inquiry Submited']);
    }
}
