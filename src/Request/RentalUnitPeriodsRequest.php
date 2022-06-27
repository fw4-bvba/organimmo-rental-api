<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class RentalUnitPeriodsRequest extends CollectionRequest
{
    const ENDPOINT = 'rentalunitperiods';

    public function get(?int $id = null, ?bool $include_promotions = null)
    {
        if (isset($id)) {
            $request = new RentalUnitPeriodRequest($id, $this->adapter);
            if (isset($include_promotions)) {
                $request->includePromotions($include_promotions);
            } else if (isset($this->_data['includepromotions'])) {
                $request->includePromotions($this->_data['includepromotions'] ? true : false);
            }
            return $this->getChildResponse($request);
        } else {
            return parent::get();
        }
    }

    public function availableOnly(bool $available_only): RentalUnitPeriodsRequest
    {
        $this->_data['availableOnly'] = $available_only ? 1 : 0;
        return $this;
    }

    public function includePromotions(bool $include_promotions): RentalUnitPeriodsRequest
    {
        $this->_data['includepromotions'] = $include_promotions ? 1 : 0;
        return $this;
    }

    public function standardPeriod(int $standard_period_id): RentalUnitPeriodsRequest
    {
        $this->_data['standardPeriod'] = $standard_period_id;
        return $this;
    }
}
