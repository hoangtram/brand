<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cowell\Brand\Model\Brands;

use Cowell\Brand\Model\ResourceModel\Brands\CollectionFactory;
/**
 * Description of DataProvider
 *
 * @author Tram
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $brandCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $brandCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Customer $customer */
        foreach ($items as $brand) {
            
            $this->loadedData[$brand->getBrandId()] = $brand->getData();
        }


        return $this->loadedData;

    }
}

