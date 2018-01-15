<?php


namespace Cowell\Brand\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Cowell\Brand\Api\Data\BrandSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Cowell\Brand\Api\BrandRepositoryInterface;
use Magento\Framework\Api\SortOrder;
use Cowell\Brand\Api\Data\BrandInterfaceFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Cowell\Brand\Model\ResourceModel\Brand\CollectionFactory as BrandCollectionFactory;
use Cowell\Brand\Model\ResourceModel\Brand as ResourceBrand;

class BrandRepository implements brandRepositoryInterface
{

    protected $brandFactory;

    protected $brandCollectionFactory;

    protected $dataObjectProcessor;

    protected $dataObjectHelper;

    protected $searchResultsFactory;

    protected $resource;

    private $storeManager;

    protected $dataBrandFactory;


    /**
     * @param ResourceBrand $resource
     * @param BrandFactory $brandFactory
     * @param BrandInterfaceFactory $dataBrandFactory
     * @param BrandCollectionFactory $brandCollectionFactory
     * @param BrandSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceBrand $resource,
        BrandFactory $brandFactory,
        BrandInterfaceFactory $dataBrandFactory,
        BrandCollectionFactory $brandCollectionFactory,
        BrandSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->brandFactory = $brandFactory;
        $this->brandCollectionFactory = $brandCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataBrandFactory = $dataBrandFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Cowell\Brand\Api\Data\BrandInterface $brand
    ) {
        /* if (empty($brand->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $brand->setStoreId($storeId);
        } */
        try {
            $brand->getResource()->save($brand);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the brand: %1',
                $exception->getMessage()
            ));
        }
        return $brand;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($brandId)
    {
        $brand = $this->brandFactory->create();
        $brand->getResource()->load($brand, $brandId);
        if (!$brand->getId()) {
            throw new NoSuchEntityException(__('Brand with id "%1" does not exist.', $brandId));
        }
        return $brand;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->brandCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Cowell\Brand\Api\Data\BrandInterface $brand
    ) {
        try {
            $brand->getResource()->delete($brand);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Brand: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($brandId)
    {
        return $this->delete($this->getById($brandId));
    }
}
