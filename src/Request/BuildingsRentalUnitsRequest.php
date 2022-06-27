<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class BuildingsRentalUnitsRequest extends CollectionRequest
{
    protected $id;

    public function __construct(int $id, ApiAdapter $adapter)
    {
        $this->id = $id;
        parent::__construct($adapter);
    }

    public function getEndpoint(): string
    {
        return 'buildings/' . $this->id . '/rentalunits';
    }

    /**
     * Get the options for a specific rental unit (specified by its ID).
     *
     * @param int $rental_unit_id
     */
    public function options(int $rental_unit_id): BuildingsRentalUnitsOptionsRequest
    {
        return new BuildingsRentalUnitsOptionsRequest($this->id, $rental_unit_id, $this->adapter);
    }
}
