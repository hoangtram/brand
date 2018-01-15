<?php


namespace Cowell\Brand\Model\ResourceModel\Brand;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Cowell\Brand\Model\Brand',
            'Cowell\Brand\Model\ResourceModel\Brand'
        );
    }
}
