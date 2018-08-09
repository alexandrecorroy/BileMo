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

use App\UI\Responder\Product\Interfaces\AddProductResponderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface AddProductActionInterface.
 */
interface AddProductActionInterface
{

    /**
     * AddProductActionInterface constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager);

    /**
     * @param Request $request
     * @param AddProductResponderInterface $addProductResponder
     *
     * @return Response
     */
    public function __invoke(Request $request, AddProductResponderInterface $addProductResponder): Response;
}