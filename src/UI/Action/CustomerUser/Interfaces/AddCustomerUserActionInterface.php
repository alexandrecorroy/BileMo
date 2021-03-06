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

namespace App\UI\Action\CustomerUser\Interfaces;

use App\Repository\Interfaces\CustomerRepositoryInterface;
use App\Repository\Interfaces\CustomerUserRepositoryInterface;
use App\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Responder\CustomerUser\Interfaces\AddCustomerUserResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface AddCustomerUserActionInterface.
 */
interface AddCustomerUserActionInterface
{

    /**
     * AddCustomerUserActionInterface constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerUserRepositoryInterface $customerUserRepository
     * @param SerializerInterface $serializer
     * @param ValidatorInterface $validator
     * @param TokenStorageInterface $tokenStorage
     * @param RouterInterface $router
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CustomerRepositoryInterface $customerRepository,
        CustomerUserRepositoryInterface $customerUserRepository,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        TokenStorageInterface $tokenStorage,
        RouterInterface $router
    );

    /**
     * @param Request $request
     * @param AddCustomerUserResponderInterface $addCustomerUserResponder
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        AddCustomerUserResponderInterface $addCustomerUserResponder
    ): Response;
}
