<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Pwc\ProductInquiry\Ui\Component\Listing\Column;

class CustProdInqActions extends \Magento\Ui\Component\Listing\Columns\Column
{

    const URL_PATH_EDIT = 'pwc_productinquiry/custprodinq/edit';
    const URL_PATH_REPLY = 'pwc_productinquiry/custprodinq/reply';
    const URL_PATH_DELETE = 'pwc_productinquiry/custprodinq/delete';
    protected $urlBuilder;
    const URL_PATH_DETAILS = 'pwc_productinquiry/custprodinq/details';

    /**
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['custprodinq_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'custprodinq_id' => $item['custprodinq_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_DELETE,
                                [
                                    'custprodinq_id' => $item['custprodinq_id']
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete'),
                                'message' => __('Are you sure you wan\'t to delete this record?')
                            ]
                        ],
                        'reply' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_REPLY,
                                [
                                    'custprodinq_id' => $item['custprodinq_id']
                                ]
                            ),
                            'label' => __('Admin Reply')
                        ]
                    ];
                }
            }
        }
        
        return $dataSource;
    }
}

