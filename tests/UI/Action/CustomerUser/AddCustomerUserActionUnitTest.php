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

namespace App\Tests\UI\Action\CustomerUser;

use App\Entity\Customer;
use App\Entity\CustomerUser;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use App\Repository\Interfaces\CustomerUserRepositoryInterface;
use App\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\CustomerUser\AddCustomerUserAction;
use App\UI\Action\CustomerUser\Interfaces\AddCustomerUserActionInterface;
use App\UI\Responder\CustomerUser\Interfaces\AddCustomerUserResponderInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * final Class AddCustomerUserActionUnitTest.
 */
final class AddCustomerUserActionUnitTest extends TestCase
{
    /**
     * @var ProductRepositoryInterface|null
     */
    private $productRepository = null;

    /**
     * @var CustomerUserRepositoryInterface|null
     */
    private $customerUserRepository = null;

    /**
     * @var SerializerInterface|null
     */
    private $serializer = null;

    /**
     * @var ValidatorInterface|null
     */
    private $validator = null;

    /**
     * @var TokenStorageInterface|null
     */
    private $tokenStorage = null;

    /**
     * @var null
     */
    private $request = null;

    /**
     * @var AddCustomerUserResponderInterface|null
     */
    private $responder = null;

    /**
     * @var RouterInterface|null
     */
    private $router = null;

    /**
     * @var CustomerRepositoryInterface|null
     */
    private $customerRepository = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->productRepository      = $this->createMock(ProductRepositoryInterface::class);
        $this->customerUserRepository = $this->createMock(CustomerUserRepositoryInterface::class);
        $this->serializer             = $this->createMock(SerializerInterface::class);
        $this->validator              = $this->createMock(ValidatorInterface::class);
        $this->tokenStorage           = $this->createMock(TokenStorageInterface::class);
        $this->responder              = $this->createMock(AddCustomerUserResponderInterface::class);
        $this->router                 = $this->createMock(RouterInterface::class);
        $this->customerRepository     = $this->createMock(CustomerRepositoryInterface::class);
        $request                      = Request::create('/', 'POST');
        $this->request                = $request->duplicate(null, null);
    }

    /**
     * test AddCustomerUserAction
     */
    public function testAddCustomerUserAction()
    {
        $addCustomerUserAction = new AddCustomerUserAction(
            $this->productRepository,
            $this->customerRepository,
            $this->customerUserRepository,
            $this->serializer,
            $this->validator,
            $this->tokenStorage,
            $this->router
        );

        static::assertInstanceOf(AddCustomerUserActionInterface::class, $addCustomerUserAction);
    }

    /**
     * test response
     */
    public function testResponseIsReturned()
    {
        $customerUserMock   = $this->createMock(CustomerUser::class);
        $tokenInterfaceMock = $this->createMock(TokenInterface::class);
        $customerMock       = $this->createMock(Customer::class);

        $customerUserMock->method('getCustomer')->willReturn($customerMock);
        $this->serializer->method('deserialize')->willReturn($customerUserMock);
        $this->validator->method('validate')->willReturn([]);
        $tokenInterfaceMock->method('getUser')->willReturn($customerMock);
        $this->tokenStorage->method('getToken')->willReturn($tokenInterfaceMock);

        $action = new AddCustomerUserAction(
            $this->productRepository,
            $this->customerRepository,
            $this->customerUserRepository,
            $this->serializer,
            $this->validator,
            $this->tokenStorage,
            $this->router
        );

        static::assertInstanceOf(Response::class, $action($this->request, $this->responder));
    }
}
