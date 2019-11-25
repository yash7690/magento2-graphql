<?php

namespace MyVendor\GraphQLSampleModule\Api\Data;

/**
 * GraphQLItems interface.
 * @api
 * @since 1.0.0
 */
interface GraphQLItemsInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ITEM_ID = 'item_id';
    const TITLE = 'title';
    const CREATED_AT = 'created_at';

    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return boolean
     */
    public function getCreatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @param string $title
     * @return $this
     */
    public function setTitles($title);

    /**
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at);
}
