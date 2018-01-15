<?php


namespace Cowell\Brand\Model;

use Cowell\Brand\Api\Data\BrandInterface;

class Brand extends \Magento\Framework\Model\AbstractModel implements BrandInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Cowell\Brand\Model\ResourceModel\Brand');
    }

    /**
     * Get brand_id
     * @return string
     */
    public function getBrandId()
    {
        return $this->getData(self::BRAND_ID);
    }

    /**
     * Set brand_id
     * @param string $brandId
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setBrandId($brandId, $brand_id)
    {
        return $this->setData(self::BRAND_ID, $brandId);

        return $this->setData(self::BRAND_ID, $brand_id);
    }

    /**
     * Get brand
     * @return string
     */
    public function getBrand()
    {
        return $this->getData(self::BRAND);
    }

    /**
     * Set brand
     * @param string $brand
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setBrand($brand)
    {
        return $this->setData(self::BRAND, $brand);
    }

    /**
     * Get website_id
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getData(self::WEBSITE_ID);
    }

    /**
     * Set website_id
     * @param string $website_id
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setWebsiteId($website_id)
    {
        return $this->setData(self::WEBSITE_ID, $website_id);
    }

    /**
     * Get shop_code
     * @return string
     */
    public function getShopCode()
    {
        return $this->getData(self::SHOP_CODE);
    }

    /**
     * Set shop_code
     * @param string $shop_code
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setShopCode($shop_code)
    {
        return $this->setData(self::SHOP_CODE, $shop_code);
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get src
     * @return string
     */
    public function getSrc()
    {
        return $this->getData(self::SRC);
    }

    /**
     * Set src
     * @param string $src
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setSrc($src)
    {
        return $this->setData(self::SRC, $src);
    }

    /**
     * Get brand_inf_dt
     * @return string
     */
    public function getBrandInfDt()
    {
        return $this->getData(self::BRAND_INF_DT);
    }

    /**
     * Set brand_inf_dt
     * @param string $brand_inf_dt
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setBrandInfDt($brand_inf_dt)
    {
        return $this->setData(self::BRAND_INF_DT, $brand_inf_dt);
    }

    /**
     * Get soa_dt
     * @return string
     */
    public function getSoaDt()
    {
        return $this->getData(self::SOA_DT);
    }

    /**
     * Set soa_dt
     * @param string $soa_dt
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setSoaDt($soa_dt)
    {
        return $this->setData(self::SOA_DT, $soa_dt);
    }

    /**
     * Get delete_flg
     * @return string
     */
    public function getDeleteFlg()
    {
        return $this->getData(self::DELETE_FLG);
    }

    /**
     * Set delete_flg
     * @param string $delete_flg
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setDeleteFlg($delete_flg)
    {
        return $this->setData(self::DELETE_FLG, $delete_flg);
    }

    /**
     * Get created_at
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $created_at
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(self::CREATED_AT, $created_at);
    }

    /**
     * Get update_at
     * @return string
     */
    public function getUpdateAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    /**
     * Set update_at
     * @param string $update_at
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setUpdateAt($update_at)
    {
        return $this->setData(self::UPDATE_AT, $update_at);
    }

    /**
     * Get upuser_id
     * @return string
     */
    public function getUpuserId()
    {
        return $this->getData(self::UPUSER_ID);
    }

    /**
     * Set upuser_id
     * @param string $upuser_id
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setUpuserId($upuser_id)
    {
        return $this->setData(self::UPUSER_ID, $upuser_id);
    }
}
