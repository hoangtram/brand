<?php


namespace Cowell\Brand\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
	$installer->startSetup();
	if (!$installer->tableExists('cowell_brand_brand')) {
            $table = $installer->getConnection()->newTable(
                    $installer->getTable('cowell_brand_brand')
            )->addColumn(
                'brand_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Brand Id'
            )->addColumn(
                'brand',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                8,
                ['nullable' => false],
                'Brand'
            )->addColumn(
                'website_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true],
                'Website Id'
            )->addColumn(
                'shop_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                14,
                [],
                'Shop Code'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                80,
                [],
                'Name'
            )->addColumn(
                'src',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                200,
                [],
                'Source'
            )->addColumn(
                'brand_inf_dt',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                [],
                'SOA import date'
            )->addColumn(
                'soa_dt',
                \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
                null,
                [],
                'SOA output date'
            )->addColumn(
                'delete_flg',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false],
                'Delete Flag'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Created At'
            )->addColumn(
                'update_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Update At'
            )->addColumn(
                'upuser_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true],
                'Update User ID'
            )->setComment('Brand Table');
            $setup->getConnection()->createTable($table);
            $setup->endSetup();
        }
    }
}
