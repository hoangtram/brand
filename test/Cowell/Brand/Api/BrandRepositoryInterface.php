<?php


namespace Cowell\Brand\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface BrandRepositoryInterface
{


    /**
     * Save Brand
     * @param \Cowell\Brand\Api\Data\BrandInterface $brand
     * @return \Cowell\Brand\Api\Data\BrandInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Cowell\Brand\Api\Data\BrandInterface $brand
    );

    /**
     * Retrieve Brand
     * @param string $brandId
     * @return \Cowell\Brand\Api\Data\BrandInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($brandId);

    /**
     * Retrieve Brand matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Cowell\Brand\Api\Data\BrandSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Brand
     * @param \Cowell\Brand\Api\Data\BrandInterface $brand
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Cowell\Brand\Api\Data\BrandInterface $brand
    );

    /**
     * Delete Brand by ID
     * @param string $brandId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($brandId);
}
