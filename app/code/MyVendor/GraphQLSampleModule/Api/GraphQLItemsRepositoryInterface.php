<?php

namespace MyVendor\GraphQLSampleModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * MyVendor GraphQLItems Interface
 * @api
 * @since 1.0.0
 */
interface GraphQLItemsRepositoryInterface
{
    /**
     * Retrieve GraphQLItems list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \MyVendor\GraphQLSampleModule\Api\Data\GraphQLItemsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}
