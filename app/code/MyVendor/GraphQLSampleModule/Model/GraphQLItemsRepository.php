<?php

namespace MyVendor\GraphQLSampleModule\Model;

use MyVendor\GraphQLSampleModule\Api\GraphQLItemsRepositoryInterface;
use MyVendor\GraphQLSampleModule\Api\Data\GraphQLItemsSearchResultsInterfaceFactory as SearchResultFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use MyVendor\GraphQLSampleModule\Model\ResourceModel\GraphQLItems\CollectionFactory;

class GraphQLItemsRepository implements GraphQLItemsRepositoryInterface
{
    public function __construct(
        SearchResultFactory $searchResultFactory,
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $collectionFactory
    ) {
        $this->searchResultFactory = $searchResultFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     *
     * @return GraphQLItems[]
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResult = $this->searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }
}
