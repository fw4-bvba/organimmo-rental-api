<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class BuildingGroupsRequest extends CollectionRequest
{
    const ENDPOINT = 'buildinggroups';
    
    public function get(?int $id = null)
    {
        if (isset($id)) {
            return $this->getChildResponse(new BuildingGroupRequest($id, $this->adapter));
        } else {
            return parent::get();
        }
    }
}
