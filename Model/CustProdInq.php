<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Model;

use Magento\Framework\Model\AbstractModel;
use Pwc\ProductInquiry\Api\Data\CustProdInqInterface;

class CustProdInq extends AbstractModel implements CustProdInqInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Pwc\ProductInquiry\Model\ResourceModel\CustProdInq::class);
    }

    /**
     * @inheritDoc
     */
    public function getCustprodinqId()
    {
        return $this->getData(self::CUSTPRODINQ_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustprodinqId($custprodinqId)
    {
        return $this->setData(self::CUSTPRODINQ_ID, $custprodinqId);
    }

    /**
     * @inheritDoc
     */
    public function getInquiryId()
    {
        return $this->getData(self::INQUIRY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setInquiryId($inquiryId)
    {
        return $this->setData(self::INQUIRY_ID, $inquiryId);
    }

    /**
     * @inheritDoc
     */
    public function getProductSku()
    {
        return $this->getData(self::PRODUCT_SKU);
    }

    /**
     * @inheritDoc
     */
    public function setProductSku($productSku)
    {
        return $this->setData(self::PRODUCT_SKU, $productSku);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerName()
    {
        return $this->getData(self::CUSTOMER_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerName($customerName)
    {
        return $this->setData(self::CUSTOMER_NAME, $customerName);
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @inheritDoc
     */
    public function getInquirySubject()
    {
        return $this->getData(self::INQUIRY_SUBJECT);
    }

    /**
     * @inheritDoc
     */
    public function setInquirySubject($inquirySubject)
    {
        return $this->setData(self::INQUIRY_SUBJECT, $inquirySubject);
    }

    /**
     * @inheritDoc
     */
    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    /**
     * @inheritDoc
     */
    public function setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

    /**
     * @inheritDoc
     */
    public function getInqGen()
    {
        return $this->getData(self::INQ_GEN);
    }

    /**
     * @inheritDoc
     */
    public function setInqGen($inqGen)
    {
        return $this->setData(self::INQ_GEN, $inqGen);
    }

    /**
     * @inheritDoc
     */
    public function getReply()
    {
        return $this->getData(self::REPLY);
    }

    /**
     * @inheritDoc
     */
    public function setReply($reply)
    {
        return $this->setData(self::REPLY, $reply);
    }
}

