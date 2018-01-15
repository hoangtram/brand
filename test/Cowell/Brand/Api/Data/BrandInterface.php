<?php


namespace Cowell\Brand\Api\Data;

interface BrandInterface
{

    const DELETE_FLG = 'delete_flg';
    const SRC = 'src';
    const SHOP_CODE = 'shop_code';
    const BRAND_INF_DT = 'brand_inf_dt';
    const BRAND_ID = 'brand_id';
    const CREATED_AT = 'created_at';
    const SOA_DT = 'soa_dt';
    const UPUSER_ID = 'upuser_id';
    const BRAND = 'brand';
    const NAME = 'name';
    const WEBSITE_ID = 'website_id';
    const UPDATE_AT = 'update_at';


    /**
     * Get brand_id
     * @return string|null
     */
    public function getBrandId();

    /**
     * Set brand_id
     * @param string $brand_id
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setBrandId($brandId, $brand_id);

    /**
     * Get brand
     * @return string|null
     */
    public function getBrand();

    /**
     * Set brand
     * @param string $brand
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setBrand($brand);

    /**
     * Get website_id
     * @return string|null
     */
    public function getWebsiteId();

    /**
     * Set website_id
     * @param string $website_id
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setWebsiteId($website_id);

    /**
     * Get shop_code
     * @return string|null
     */
    public function getShopCode();

    /**
     * Set shop_code
     * @param string $shop_code
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setShopCode($shop_code);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setName($name);

    /**
     * Get src
     * @return string|null
     */
    public function getSrc();

    /**
     * Set src
     * @param string $src
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setSrc($src);

    /**
     * Get brand_inf_dt
     * @return string|null
     */
    public function getBrandInfDt();

    /**
     * Set brand_inf_dt
     * @param string $brand_inf_dt
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setBrandInfDt($brand_inf_dt);

    /**
     * Get soa_dt
     * @return string|null
     */
    public function getSoaDt();

    /**
     * Set soa_dt
     * @param string $soa_dt
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setSoaDt($soa_dt);

    /**
     * Get delete_flg
     * @return string|null
     */
    public function getDeleteFlg();

    /**
     * Set delete_flg
     * @param string $delete_flg
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setDeleteFlg($delete_flg);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $created_at
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setCreatedAt($created_at);

    /**
     * Get update_at
     * @return string|null
     */
    public function getUpdateAt();

    /**
     * Set update_at
     * @param string $update_at
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setUpdateAt($update_at);

    /**
     * Get upuser_id
     * @return string|null
     */
    public function getUpuserId();

    /**
     * Set upuser_id
     * @param string $upuser_id
     * @return \Cowell\Brand\Api\Data\BrandInterface
     */
    public function setUpuserId($upuser_id);
}
