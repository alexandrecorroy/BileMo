<?php

declare(strict_types=1);

/**
 * BileMo Project
 *
 * (c) CORROY Alexandre <alexandre.corroy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\UI\Action\Product;

use App\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\Product\Interfaces\GetProductActionInterface;
use App\UI\Responder\Product\Interfaces\GetProductResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * final Class GetProductAction.
 *
 * @Route("/product/show/{id}", name="product_show", methods={"GET"})
 */
final class GetProductAction implements GetProductActionInterface
{

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * {@inheritdoc}
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request, GetProductResponderInterface $getProductResponder): Response
    {
        $product = $this->productRepository->findOneByUuidField($request->attributes->get('id'));

        return $getProductResponder($request, $product);
    }
}
