<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class BuildingsRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'buildings';

    /**
     * Get the rental units for a specific building (specified by its ID).
     *
     * @param int $building_id
     */
    public function rentalUnits(int $building_id): BuildingsRentalUnitsRequest
    {
        return new BuildingsRentalUnitsRequest($building_id, $this->adapter);
    }

    /**
     * Get all counters for a specific building (specified by its ID).
     *
     * @param int $building_id
     */
    public function counters(int $building_id): BuildingsCountersRequest
    {
        return new BuildingsCountersRequest($building_id, $this->adapter);
    }
}
