<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class KindsRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'kinds';

    public function subkinds(int $kind_id): KindSubkindsRequest
    {
        return new KindSubkindsRequest($kind_id, $this->adapter);
    }
}
