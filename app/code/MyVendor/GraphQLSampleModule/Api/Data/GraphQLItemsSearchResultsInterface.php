<?php

namespace MyVendor\GraphQLSampleModule\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for GraphQLItems search results.
 * @api
 * @since 100.0.2
 */
interface GraphQLItemsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get GraphQLItems list.
     *
     * @return \MyVendor\GraphQLSampleModule\Api\Data\GraphQLItemsInterface[]
     */
    public function getItems();

    /**
     * Set GraphQLItems list.
     *
     * @param \MyVendor\GraphQLSampleModule\Api\Data\GraphQLItemsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
