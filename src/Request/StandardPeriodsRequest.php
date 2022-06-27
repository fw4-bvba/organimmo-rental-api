<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class StandardPeriodsRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'standardperiods';

    /**
     * Get the rental unit periods for a specific standard period.
     *
     * @param int $standard_period_id
     */
    public function periods(int $standard_period_id): StandardPeriodPeriodsRequest
    {
        return new StandardPeriodPeriodsRequest($standard_period_id, $this->adapter);
    }
}
