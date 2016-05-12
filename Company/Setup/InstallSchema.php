<?php

namespace Magestore\Company\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /*
         * Drop tables if exists
         */
        $installer->getConnection()->dropTable($installer->getTable('magestore_company_staffs'));
       

        /*
         * Create table magestore_company_staffs
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magestore_company_staffs')
        )->addColumn(
            'staff_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Staff ID'
        )->addColumn(
            'staff_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
            'Staff Name'
        )->addColumn(
            'staff_email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            ' Staff Email'
        );
        $installer->getConnection()->createTable($table);
        /*
         * End create table magestore_company_staffs
         */

       

        $installer->endSetup();
    }
}