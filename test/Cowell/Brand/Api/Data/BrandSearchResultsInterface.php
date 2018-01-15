<?php


namespace Cowell\Brand\Api\Data;

interface BrandSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get Brand list.
     * @return \Cowell\Brand\Api\Data\BrandInterface[]
     */
    public function getItems();

    /**
     * Set brand_id list.
     * @param \Cowell\Brand\Api\Data\BrandInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
