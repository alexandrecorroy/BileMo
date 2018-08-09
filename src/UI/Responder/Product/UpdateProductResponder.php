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

use App\UI\Responder\Product\Interfaces\UpdateProductResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * final Class UpdateProductResponder.
 */
final class UpdateProductResponder implements UpdateProductResponderInterface
{

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request): Response
    {
        // TODO: Implement __invoke() method.
    }
}
