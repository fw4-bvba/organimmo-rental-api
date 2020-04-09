<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class RoutesRequest extends CollectionRequest
{
    const ENDPOINT = 'routes';
    
    public function get(?int $id = null)
    {
        if (isset($id)) {
            return $this->getChildResponse(new RouteRequest($id, $this->adapter));
        } else {
            return parent::get();
        }
    }
}
