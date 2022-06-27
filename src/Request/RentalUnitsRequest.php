<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class RentalUnitsRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'rentalunits';

    /**
     * Get the guarantees for a specific rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function guarantees(int $rental_unit_id): RentalUnitsGuaranteesRequest
    {
        return new RentalUnitsGuaranteesRequest($rental_unit_id, $this->adapter);
    }

    /**
     * Get the periods for a specific rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function periods(int $rental_unit_id, ?bool $available_only = null): RentalUnitsPeriodsRequest
    {
        $request = new RentalUnitsPeriodsRequest($rental_unit_id, $this->adapter);
        if (isset($available_only)) $request->availableOnly($available_only);
        return $request;
    }

    /**
     * Get the rooms associated with a specific rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function places(int $rental_unit_id): RentalUnitsPlacesRequest
    {
        return new RentalUnitsPlacesRequest($rental_unit_id, $this->adapter);
    }

    /**
     * Get the options associated with a specific rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function options(int $rental_unit_id): RentalUnitsOptionsRequest
    {
        return new RentalUnitsOptionsRequest($rental_unit_id, $this->adapter);
    }

    /**
     * Get the cost factors associated with a specific rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function costFactors(int $rental_unit_id): RentalUnitsCostFactorsRequest
    {
        return new RentalUnitsCostFactorsRequest($rental_unit_id, $this->adapter);
    }

    /**
     * Get the promotions for a specific rental unit using ID.
     *
     * @param int $rental_unit_id
     * @param int $period_id
     */
    public function promotions(int $rental_unit_id, ?int $period_id = null): RentalUnitsPromotionsRequest
    {
        $request = new RentalUnitsPromotionsRequest($rental_unit_id, $this->adapter);
        if (isset($period_id)) $request->period($period_id);
        return $request;
    }

    /**
     * Get the photos of a specified rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function photos(int $rental_unit_id): RentalUnitsPhotosRequest
    {
        return new RentalUnitsPhotosRequest($rental_unit_id, $this->adapter);
    }

    /**
     * Get the occupation of day parts of a specified rental unit using ID.
     *
     * @param int $rental_unit_id
     */
    public function dayPartOccupations(int $rental_unit_id): RentalUnitsDayPartOccupationsRequest
    {
        return new RentalUnitsDayPartOccupationsRequest($rental_unit_id, $this->adapter);
    }
}
