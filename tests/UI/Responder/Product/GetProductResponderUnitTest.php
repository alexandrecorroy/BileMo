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

namespace App\Tests\UI\Responder\Product;

use App\UI\Responder\Product\GetProductResponder;
use App\UI\Responder\Product\Interfaces\GetProductResponderInterface;
use PHPUnit\Framework\TestCase;

/**
 * final Class GetProductResponderUnitTest.
 */
final class GetProductResponderUnitTest extends TestCase
{

    /**
     * test GetProductResponder
     */
    public function testGetProductResponder()
    {
        $getProductResponder = new GetProductResponder();

        static::assertInstanceOf(GetProductResponderInterface::class, $getProductResponder);
    }
}
