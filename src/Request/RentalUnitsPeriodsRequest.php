<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class RentalUnitsPeriodsRequest extends CollectionRequest
{
    protected $id;

    public function __construct(int $id, ApiAdapter $adapter)
    {
        $this->id = $id;
        parent::__construct($adapter);
    }

    public function getEndpoint(): string
    {
        return 'rentalunits/' . $this->id . '/periods';
    }

    public function availableOnly(bool $available_only): RentalUnitsPeriodsRequest
    {
        $this->_data['availableOnly'] = $available_only ? 1 : 0;
        return $this;
    }

    public function standardPeriod(int $standard_period_id): RentalUnitsPeriodsRequest
    {
        $this->_data['standardPeriod'] = $standard_period_id;
        return $this;
    }

    public function includePromotions(bool $include_promotions): RentalUnitsPeriodsRequest
    {
        $this->_data['includepromotions'] = $include_promotions ? 1 : 0;
        return $this;
    }
}
