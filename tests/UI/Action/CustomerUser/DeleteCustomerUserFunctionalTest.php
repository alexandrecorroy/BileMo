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


use App\Entity\CustomerUser;
use App\Tests\DataFixtures\DataFixtureTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\Security;

/**
 * final Class DeleteCustomerUserFunctionalTest.
 */
final class DeleteCustomerUserFunctionalTest extends DataFixtureTestCase
{
    /**
     * @var Router|null
     */
    private $router = null;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->router = self::$container->get('router');
    }

    /**
     * test delete a customerUser
     */
    public function testDeleteCustomerUser()
    {
        $uri = $this->router->generate('customer_user_list');
        $this->client = self::createAuthenticatedRoleUser();
        $this->client->request('GET', $uri);

        $customerUsers = json_decode($this->client->getResponse()->getContent());

        foreach ($customerUsers as $customerUser)
        {
            $uri = $this->router->generate('customer_user_delete', ['id' => $customerUser->{'uid'}]);

            $this->client->request('DELETE', $uri);

            static::assertEquals(Response::HTTP_ACCEPTED, $this->client->getResponse()->getStatusCode());
            static::assertTrue($this->client->getResponse()->headers->contains('content-type', 'application/json'));
        }
    }
}