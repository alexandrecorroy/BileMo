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

namespace App\UI\Action\Product\Interfaces;

use App\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Responder\Product\Interfaces\ListProductResponderInterface;
use App\UI\Responder\Product\Interfaces\NotFoundProductResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface ListProductActionInterface.
 */
interface ListProductActionInterface
{

    /**
     * ListProductActionInterface constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository);

    /**
     * @param Request $request
     * @param ListProductResponderInterface $listProductResponder
     * @param NotFoundProductResponderInterface $notFoundProductResponder
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        ListProductResponderInterface $listProductResponder,
        NotFoundProductResponderInterface $notFoundProductResponder
    ): Response;
}
