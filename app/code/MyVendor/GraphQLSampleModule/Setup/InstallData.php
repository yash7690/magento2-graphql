<?php

namespace MyVendor\GraphQLSampleModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	/**
     * GraphQLItems factory
     *
     * @var graphQLItemsFactory
     */
    private $graphQLItemsFactory;

    /**
     * Init
     *
     * @param \MyVendor\GraphQLSampleModule\Model\GraphQLItemsFactory $graphQLItemsFactory
     */
    public function __construct(\MyVendor\GraphQLSampleModule\Model\GraphQLItemsFactory $graphQLItemsFactory)
    {
        $this->graphQLItemsFactory = $graphQLItemsFactory;
    }

	/**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
    	$setup->startSetup();

    	$this->_insertSampleData();

    	$setup->endSetup();
    }

    protected function _insertSampleData()
    {
    	$graphQLItems = [];

        for ($i=1; $i <= 100; $i++) { 
            $graphQLItems[] = [
                'title' => 'GraphQL Item #' . $i
            ];
        }

        foreach ($graphQLItems as $data) {
            $this->createGraphQLItem()->setData($data)->save();
        }
    }
    
    public function createGraphQLItem()
    {
        return $this->graphQLItemsFactory->create();
    }
}
