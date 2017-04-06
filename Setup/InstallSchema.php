<?php


namespace JM\StoreLocator\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

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

        $table_jm_storelocator = $setup->getConnection()->newTable($setup->getTable('jm_storelocator'));

        
        $table_jm_storelocator->addColumn(
            'storelocator_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );
        

        
        $table_jm_storelocator->addColumn(
            'LocationName',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'LocationName'
        );
        

        
        $table_jm_storelocator->addColumn(
            'LongLat',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'LongLat'
        );
        

        
        $table_jm_storelocator->addColumn(
            'StoreAddress',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'StoreAddress'
        );
        

        
        $table_jm_storelocator->addColumn(
            'StorePhone',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'StorePhone'
        );
        

        
        $table_jm_storelocator->addColumn(
            'StoreHours',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'StoreHours'
        );
        

        $setup->getConnection()->createTable($table_jm_storelocator);

        $setup->endSetup();
    }
}
