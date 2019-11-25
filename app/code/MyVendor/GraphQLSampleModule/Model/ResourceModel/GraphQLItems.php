<?php

namespace MyVendor\GraphQLSampleModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class GraphQLItems extends AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }
    
    protected function _construct()
    {
        $this->_init(
            'myvendor_graphql_items',
            'item_id'
        );
    }
}
