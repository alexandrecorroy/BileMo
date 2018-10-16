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

namespace App;

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;
/**
 * final Class CacheKernel.
 */
final class CacheKernel extends HttpCache
{
    protected function getOptions()
    {
        return array(
            'debug' => true
        );
    }
}
