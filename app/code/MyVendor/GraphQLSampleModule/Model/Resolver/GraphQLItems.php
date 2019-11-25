<?php

namespace MyVendor\GraphQLSampleModule\Model\Resolver;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\CatalogGraphQl\Model\Resolver\Products\Query\Filter;
use Magento\CatalogGraphQl\Model\Resolver\Products\Query\Search;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\SearchFilter;
use Magento\Framework\GraphQl\Query\ResolverInterface;

class GraphQLItems implements ResolverInterface
{
    /**
     * @var Builder
     */
    private $searchCriteriaBuilder;

    /**
     * @var Search
     */
    private $searchQuery;

    /**
     * @var Filter
     */
    private $filterQuery;

    /**
     * @var SearchFilter
     */
    private $searchFilter;

    /**
     * @param Builder $searchCriteriaBuilder
     * @param Search $searchQuery
     * @param Filter $filterQuery
     * @param SearchFilter $searchFilter
     */
    public function __construct(
        Builder $searchCriteriaBuilder,
        Search $searchQuery,
        Filter $filterQuery,
        SearchFilter $searchFilter,
        \MyVendor\GraphQLSampleModule\Api\GraphQLItemsRepositoryInterface $graphQLItemsRepository
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchQuery = $searchQuery;
        $this->filterQuery = $filterQuery;
        $this->searchFilter = $searchFilter;
        $this->graphQLItemsRepository = $graphQLItemsRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        $searchCriteria = $this->searchCriteriaBuilder->build($field->getName(), []);
        $searchCriteria->setCurrentPage($args['currentPage']);
        $searchCriteria->setPageSize($args['pageSize']);

        $searchResult = $this->graphQLItemsRepository->getList($searchCriteria);

        $data = [
            'totalCount' => $searchResult->getTotalCount(),
            'items' => $searchResult->getItems()
        ];

        return $data;
    }
}