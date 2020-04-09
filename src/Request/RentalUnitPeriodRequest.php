<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class RentalUnitPeriodRequest extends ItemRequest
{
    const ENDPOINT = 'rentalunitperiods';
    
    public function includePromotions(bool $include_promotions): RentalUnitPeriodRequest
    {
        $this->_data['includepromotions'] = $include_promotions ? 1 : 0;
        return $this;
    }
}
