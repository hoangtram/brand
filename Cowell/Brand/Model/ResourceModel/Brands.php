<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cowell\Brand\Model\ResourceModel;
/**
 * Description of Brand
 *
 * @author Tram
 */
class Brands extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
    
    protected function _construct()
    {
        $this->_init('brand', 'brand_id');
    }
}
