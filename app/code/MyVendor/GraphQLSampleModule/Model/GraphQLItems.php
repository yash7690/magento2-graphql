<?php

namespace MyVendor\GraphQLSampleModule\Model;

use MyVendor\GraphQLSampleModule\Api\Data\GraphQLItemsInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class GraphQLItems extends AbstractModel implements GraphQLItemsInterface, IdentityInterface
{
    /**
     * Crosslink cache tag
     */
    const CACHE_TAG = 'mv_graphqlsamplemodule_graphqlitems';

    /**
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = self::CACHE_TAG;

    protected function _construct()
    {
        $this->_init(\MyVendor\GraphQLSampleModule\Model\ResourceModel\GraphQLItems::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData(self::ITEM_ID);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setId($id)
    {
        $this->setData(self::ITEM_ID, $id);
        return $this;
    }

    public function setTitles($title)
    {
        $this->setData(self::TITLE, $title);
        return $this;
    }

    public function setCreatedAt($created_at)
    {
        $this->setData(self::CREATED_AT, $created_at);
        return $this;
    }
}
