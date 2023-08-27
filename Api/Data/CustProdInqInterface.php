<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Api\Data;

interface CustProdInqInterface
{

    const INQUIRY_ID = 'inquiry_id';
    const CUSTPRODINQ_ID = 'custprodinq_id';
    const EMAIL = 'email';
    const MESSAGE = 'message';
    const REPLY = 'reply';
    const CUSTOMER_NAME = 'customer_name';
    const PRODUCT_SKU = 'product_sku';
    const INQ_GEN = 'inq_gen';
    const INQUIRY_SUBJECT = 'inquiry_subject';

    /**
     * Get custprodinq_id
     * @return string|null
     */
    public function getCustprodinqId();

    /**
     * Set custprodinq_id
     * @param string $custprodinqId
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setCustprodinqId($custprodinqId);

    /**
     * Get inquiry_id
     * @return string|null
     */
    public function getInquiryId();

    /**
     * Set inquiry_id
     * @param string $inquiryId
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setInquiryId($inquiryId);

    /**
     * Get product_sku
     * @return string|null
     */
    public function getProductSku();

    /**
     * Set product_sku
     * @param string $productSku
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setProductSku($productSku);

    /**
     * Get customer_name
     * @return string|null
     */
    public function getCustomerName();

    /**
     * Set customer_name
     * @param string $customerName
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setCustomerName($customerName);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setEmail($email);

    /**
     * Get inquiry_subject
     * @return string|null
     */
    public function getInquirySubject();

    /**
     * Set inquiry_subject
     * @param string $inquirySubject
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setInquirySubject($inquirySubject);

    /**
     * Get message
     * @return string|null
     */
    public function getMessage();

    /**
     * Set message
     * @param string $message
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setMessage($message);

    /**
     * Get inq_gen
     * @return string|null
     */
    public function getInqGen();

    /**
     * Set inq_gen
     * @param string $inqGen
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setInqGen($inqGen);

    /**
     * Get reply
     * @return string|null
     */
    public function getReply();

    /**
     * Set reply
     * @param string $reply
     * @return \Pwc\ProductInquiry\CustProdInq\Api\Data\CustProdInqInterface
     */
    public function setReply($reply);
}

