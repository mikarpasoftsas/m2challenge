<?php
namespace Gdcp\Payment\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();   
        $setup->getConnection()->addColumn(
            $setup->getTable('quote_payment'),
            'bankowner',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'Bank',
            ]
        );
        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_payment'),
            'bankowner',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'Bank',
            ]
        );
        $setup->endSetup();
  }
}