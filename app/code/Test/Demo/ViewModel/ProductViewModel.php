<?php

namespace Test\Demo\ViewModel;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ProductViewModel implements ArgumentInterface
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly RequestInterface $request
    )
    {
    }

    public function getProduct(?string $id = null): ?Product
    {
        try {
            if (is_null($id)) {
                return $this->productRepository->getById($this->request->getParam('id'));
            }
            return $this->productRepository->getById($id);
        } catch (NoSuchEntityException) {
            return null;
        }
    }
}
