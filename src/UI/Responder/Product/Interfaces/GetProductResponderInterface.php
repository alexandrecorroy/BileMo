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

namespace App\UI\Responder\Product\Interfaces;

use App\Entity\Interfaces\ProductInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface GetProductResponderInterface.
 */
interface GetProductResponderInterface
{
    /**
     * @param Request $request
     * @param ProductInterface $product
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        ProductInterface $product
    ): Response;
}
