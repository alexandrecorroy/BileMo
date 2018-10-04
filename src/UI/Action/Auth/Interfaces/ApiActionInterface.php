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

namespace App\UI\Action\Auth\Interfaces;

use App\UI\Responder\Auth\ApiResponder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface ApiActionInterface.
 */
interface ApiActionInterface
{
    public function __invoke(ApiResponder $loginResponder): Response;
}
