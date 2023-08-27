<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Model\ResourceModel\CustProdInq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'custprodinq_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Pwc\ProductInquiry\Model\CustProdInq::class,
            \Pwc\ProductInquiry\Model\ResourceModel\CustProdInq::class
        );
    }
}

