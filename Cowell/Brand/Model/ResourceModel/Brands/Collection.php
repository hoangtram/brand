<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cowell\Brand\Model\ResourceModel\Brands;
/**
 * Description of Collection
 *
 * @author Tram
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
    
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Cowell\Brand\Model\Brands', 'Cowell\Brand\Model\ResourceModel\Brands');
    }

}
