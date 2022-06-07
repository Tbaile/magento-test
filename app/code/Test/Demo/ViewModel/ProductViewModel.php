<?php

namespace Test\Demo\ViewModel;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Api\AttributeInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ProductViewModel implements ArgumentInterface
{
    private ?bool $expressDelivery = null;
    private ?string $expressDeliveryMessage = null;

    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly RequestInterface $request
    )
    {
        try {
            /** @var Product $product */
            $product = $this->productRepository->getById($this->request->getParam('id'));
            $this->expressDelivery = $product->getData('express_delivery');
            $this->expressDeliveryMessage = $product->getData('express_delivery_message');
        } catch (NoSuchEntityException) {
        }
    }

    /**
     * @return bool|\Magento\Framework\Api\AttributeInterface|null
     */
    public function getExpressDelivery(): AttributeInterface|bool|null
    {
        return $this->expressDelivery;
    }

    /**
     * @return \Magento\Framework\Api\AttributeInterface|string|null
     */
    public function getExpressDeliveryMessage(): AttributeInterface|string|null
    {
        return $this->expressDeliveryMessage;
    }

}
