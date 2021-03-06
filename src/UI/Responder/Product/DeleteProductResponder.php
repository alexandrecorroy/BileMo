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

namespace App\UI\Responder\Product;

use App\UI\Responder\Product\Interfaces\DeleteProductResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DeleteProductResponder.
 */
final class DeleteProductResponder implements DeleteProductResponderInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request): Response
    {
        return new JsonResponse('Product Deleted !', Response::HTTP_ACCEPTED);
    }
}
