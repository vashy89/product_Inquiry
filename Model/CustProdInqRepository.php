<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Pwc\ProductInquiry\Api\CustProdInqRepositoryInterface;
use Pwc\ProductInquiry\Api\Data\CustProdInqInterface;
use Pwc\ProductInquiry\Api\Data\CustProdInqInterfaceFactory;
use Pwc\ProductInquiry\Api\Data\CustProdInqSearchResultsInterfaceFactory;
use Pwc\ProductInquiry\Model\ResourceModel\CustProdInq as ResourceCustProdInq;
use Pwc\ProductInquiry\Model\ResourceModel\CustProdInq\CollectionFactory as CustProdInqCollectionFactory;

class CustProdInqRepository implements CustProdInqRepositoryInterface
{

    /**
     * @var CustProdInqInterfaceFactory
     */
    protected $custProdInqFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var CustProdInqCollectionFactory
     */
    protected $custProdInqCollectionFactory;

    /**
     * @var CustProdInq
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceCustProdInq
     */
    protected $resource;


    /**
     * @param ResourceCustProdInq $resource
     * @param CustProdInqInterfaceFactory $custProdInqFactory
     * @param CustProdInqCollectionFactory $custProdInqCollectionFactory
     * @param CustProdInqSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCustProdInq $resource,
        CustProdInqInterfaceFactory $custProdInqFactory,
        CustProdInqCollectionFactory $custProdInqCollectionFactory,
        CustProdInqSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->custProdInqFactory = $custProdInqFactory;
        $this->custProdInqCollectionFactory = $custProdInqCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(CustProdInqInterface $custProdInq)
    {
        try {
            $this->resource->save($custProdInq);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the custProdInq: %1',
                $exception->getMessage()
            ));
        }
        return $custProdInq;
    }

    /**
     * @inheritDoc
     */
    public function get($custProdInqId)
    {
        $custProdInq = $this->custProdInqFactory->create();
        $this->resource->load($custProdInq, $custProdInqId);
        if (!$custProdInq->getId()) {
            throw new NoSuchEntityException(__('CustProdInq with id "%1" does not exist.', $custProdInqId));
        }
        return $custProdInq;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->custProdInqCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(CustProdInqInterface $custProdInq)
    {
        try {
            $custProdInqModel = $this->custProdInqFactory->create();
            $this->resource->load($custProdInqModel, $custProdInq->getCustprodinqId());
            $this->resource->delete($custProdInqModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CustProdInq: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($custProdInqId)
    {
        return $this->delete($this->get($custProdInqId));
    }
}

