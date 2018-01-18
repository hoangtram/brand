<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cowell\Brand\Model\Brands;

use Magento\Ui\DataProvider\Modifier\ModifierInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Cowell\Brand\Model\ResourceModel\Brands\CollectionFactory;
/**
 * Description of DataProvider
 *
 * @author Tram
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var PoolInterface
     */
    protected $pool;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        PoolInterface $pool,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->pool = $pool;
    }

    
    public function getData()
    {
        /** @var ModifierInterface $modifier */
        foreach ($this->pool->getModifiersInstances() as $modifier) {
            $this->data = $modifier->modifyData($this->data);
        }

        return $this->data;
    }
    public function getMeta()
    {
        $meta = parent::getMeta();

        /** @var ModifierInterface $modifier */
        foreach ($this->pool->getModifiersInstances() as $modifier) {
            $meta = $modifier->modifyMeta($meta);
        }

        return $meta;
    }
    
//    public function __construct(
//        $name,
//        $primaryFieldName,
//        $requestFieldName,
//        CollectionFactory $brandCollectionFactory,
//        array $meta = [],
//        array $data = []
//    ) {
//        $this->collection = $brandCollectionFactory->create();
//        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
//    }
//
//    public function getData()
//    {
//        if (isset($this->loadedData)) {
//            return $this->loadedData;
//        }
//
//        $items = $this->collection->getItems();
//        $this->loadedData = array();
//        /** @var Customer $customer */
//        foreach ($items as $brand) {
//            
//            $this->loadedData[$brand->getBrandId()] = $brand->getData();
//        }
//
//
//        return $this->loadedData;
//
//    }
}

