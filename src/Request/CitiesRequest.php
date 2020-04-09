<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class CitiesRequest extends CollectionRequest
{
    const ENDPOINT = 'cities';
    
    public function get(?int $id = null)
    {
        if (isset($id)) {
            return $this->getChildResponse(new CityRequest($id, $this->adapter));
        } else {
            return parent::get();
        }
    }
}
