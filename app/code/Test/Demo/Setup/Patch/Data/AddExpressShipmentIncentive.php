<?php

namespace Test\Demo\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddExpressShipmentIncentive implements DataPatchInterface
{
    private EavSetupFactory $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
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
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'express_delivery',
            [
                'type' => 'boolean',
                'label' => 'Express Delivery',
                'input' => 'boolean',
                'default' => '0',
                'required' => false,
                'sort_order' => 100,
                'group' => 'General',
            ]
        );
    }
}
