<?php

namespace MyVendor\GraphQLSampleModule\Model\ResourceModel\GraphQLItems;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'item_id';
	protected $_eventPrefix = 'myvendor_graphqlsamplemodule_graphqlitems_collection';
	protected $_eventObject = 'graphqlitems_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init(
			\MyVendor\GraphQLSampleModule\Model\GraphQLItems::class,
			\MyVendor\GraphQLSampleModule\Model\ResourceModel\GraphQLItems::class
		);
	}

}