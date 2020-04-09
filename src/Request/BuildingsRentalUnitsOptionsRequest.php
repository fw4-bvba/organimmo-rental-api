<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class BuildingsRentalUnitsOptionsRequest extends CollectionRequest
{
    const ENDPOINT = 'buildings';
    
    protected $buildingId;
    protected $rentalUnitId;
    
    public function __construct(int $building_id, int $rental_unit_id, ApiAdapter $adapter)
    {
        $this->buildingId = $building_id;
        $this->rentalUnitId = $rental_unit_id;
        parent::__construct($adapter);
    }

    public function getEndpoint(): string
    {
        return static::ENDPOINT . '/' . $this->buildingId . '/rentalunits/' . $this->rentalUnitId . '/options';
    }
}
