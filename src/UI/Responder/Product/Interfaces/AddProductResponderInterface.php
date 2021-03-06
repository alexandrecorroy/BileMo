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

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface AddProductResponderInterface.
 */
interface AddProductResponderInterface
{
    /**
     * @param null $uri
     * @param null $errors
     *
     * @return Response
     */
    public function __invoke(
        $uri = null,
        $errors = null
    ): Response;
}
