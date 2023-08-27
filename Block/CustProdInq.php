<?php
/*
 * @category  Pwc
 * @package   Pwc_ProductInquiry
 * @author    Vashishtha Chauhan
 */
namespace Pwc\ProductInquiry\Block;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;

class CustProdInq extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Magento\Framework\Registry 
     */
    protected $_registry;
    
    /**
     * Dependency Initilization
     * 
     * @param array
     * 
     * @param Magento\Framework\Registry
     * 
     * @return void
     */
    public function __construct(
        Context $context,        
        Registry $registry,
        array $data = []
    )
    {        
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }
    
    /**
     * Current product details
     * 
     * @return object | null
     */
    public function getCurrentProduct()
    {        
        return $this->_registry->registry('current_product');
    }    
}
