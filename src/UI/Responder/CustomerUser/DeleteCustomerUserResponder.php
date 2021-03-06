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

namespace App\UI\Responder\CustomerUser;

use App\UI\Responder\CustomerUser\Interfaces\DeleteCustomerUserResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * final Class DeleteCustomerUserResponder.
 */
final class DeleteCustomerUserResponder implements DeleteCustomerUserResponderInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request): Response
    {
        return new JsonResponse('CustomerUser Deleted !', Response::HTTP_ACCEPTED);
    }
}
