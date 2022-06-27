<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class RentalUnitPlacesRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'rentalunitplaces';

    /**
     * Get the guarantees for a specific rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function options(int $rental_unit_id): RentalUnitPlacesOptionsRequest
    {
        return new RentalUnitPlacesOptionsRequest($rental_unit_id, $this->adapter);
    }
}
