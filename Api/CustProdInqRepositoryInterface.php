<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustProdInqRepositoryInterface
{

    /**
     * Save CustProdInq
     * @param \Pwc\ProductInquiry\Api\Data\CustProdInqInterface $custProdInq
     * @return \Pwc\ProductInquiry\Api\Data\CustProdInqInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Pwc\ProductInquiry\Api\Data\CustProdInqInterface $custProdInq
    );

    /**
     * Retrieve CustProdInq
     * @param string $custprodinqId
     * @return \Pwc\ProductInquiry\Api\Data\CustProdInqInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($custprodinqId);

    /**
     * Retrieve CustProdInq matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Pwc\ProductInquiry\Api\Data\CustProdInqSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete CustProdInq
     * @param \Pwc\ProductInquiry\Api\Data\CustProdInqInterface $custProdInq
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Pwc\ProductInquiry\Api\Data\CustProdInqInterface $custProdInq
    );

    /**
     * Delete CustProdInq by ID
     * @param string $custprodinqId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($custprodinqId);
}

