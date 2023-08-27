<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Api\Data;

interface CustProdInqSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CustProdInq list.
     * @return \Pwc\ProductInquiry\Api\Data\CustProdInqInterface[]
     */
    public function getItems();

    /**
     * Set inquiry_id list.
     * @param \Pwc\ProductInquiry\Api\Data\CustProdInqInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

