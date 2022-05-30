<?php

namespace Test\Demo\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class AddExpressShipmentIncentive implements DataPatchInterface, PatchRevertableInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;
    private EavSetupFactory $eavSetupFactory;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup, EavSetupFactory $eavSetupFactory)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'express_delivery',
            [
                'type' => 'int',
                'label' => 'Express Delivery',
                'input' => 'boolean',
                'required' => false,
                'default' => '0',
                'group' => 'General'
            ]
        );
        $eavSetup->addAttribute(
            Product::ENTITY,
            'express_delivery_message',
            [
                'type' => 'varchar',
                'label' => 'Express Delivery Message',
                'input' => 'text',
                'required' => false,
                'default' => '',
                'group' => 'General'
            ]
        );
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->removeAttribute(Product::ENTITY, 'express_delivery');
        $eavSetup->removeAttribute(Product::ENTITY, 'express_delivery_message');

        $this->moduleDataSetup->getConnection()->endSetup();
    }
}
