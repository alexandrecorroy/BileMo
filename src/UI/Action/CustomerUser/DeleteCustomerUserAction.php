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

namespace App\UI\Action\CustomerUser;

use App\Repository\Interfaces\CustomerUserRepositoryInterface;
use App\UI\Action\CustomerUser\Interfaces\DeleteCustomerUserActionInterface;
use App\UI\Responder\CustomerUser\Interfaces\DeleteCustomerUserResponderInterface;
use App\UI\Responder\CustomerUser\Interfaces\ForbiddenCustomerUserResponderInterface;
use App\UI\Responder\CustomerUser\Interfaces\NotFoundCustomerUserResponderInterface;
use Doctrine\Common\Cache\ApcuCache;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class DeleteCustomerUserAction.
 *
 * @Route("api/customerUser/{id}", name="customer_user_delete", methods={"DELETE"})
 */
final class DeleteCustomerUserAction implements DeleteCustomerUserActionInterface
{
    /**
     * @var CustomerUserRepositoryInterface
     */
    private $customerUserRepository;


    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        CustomerUserRepositoryInterface $customerUserRepository,
        TokenStorageInterface $tokenStorage
    ) {
        $this->customerUserRepository = $customerUserRepository;
        $this->tokenStorage           = $tokenStorage;
    }

    /**
     *
     * Delete a customerUser.
     *
     * You can delete one of your customerUsers.
     *
     * @SWG\Response(
     *     response=202,
     *     description="Returned when successful"
     * )
     * @SWG\Response(
     *     response=403,
     *     description="Cannot delete this customerUser"
     * )
     * @SWG\Response(
     *     response=404,
     *     description="CustomerUser not found"
     * )
     * @SWG\Parameter(
     *     name="Authorization",
     *     in="header",
     *     required=true,
     *     type="string",
     *     default="Bearer TOKEN",
     *     description="Authorization"
     *)
     *@SWG\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     type="string",
     *     description="uid of customerUser"
     *)
     *@SWG\Response(
     *     response=401,
     *     description="Expired JWT Token | JWT Token not found | Invalid JWT Token",
     *)
     * @SWG\Tag(
     *     name="API"
     *     )
     * {@inheritdoc}
     */
    public function __invoke(
        Request $request,
        DeleteCustomerUserResponderInterface $deleteCustomerUserResponder,
        NotFoundCustomerUserResponderInterface $notFoundCustomerUserResponder,
        ForbiddenCustomerUserResponderInterface $forbiddenCustomerUserResponder
    ): Response {

        $cache = new ApcuCache();

        $customerUser = $this->customerUserRepository->findOneByUuidField($request->get("id"));

        if(\is_null($customerUser))
        {
            return $notFoundCustomerUserResponder();
        }

        if($customerUser->getCustomer()->getUid()->toString()!==$this->tokenStorage->getToken()->getUser()->getUid()->toString())
        {
            return $forbiddenCustomerUserResponder();
        }

        $cache->delete('find'.$customerUser->getUid()->toString());
        $cache->delete('findAllCustomerUser'.$customerUser->getCustomer()->getUid()->toString());

        $this->customerUserRepository->delete($customerUser);

        return $deleteCustomerUserResponder($request);
    }
}
