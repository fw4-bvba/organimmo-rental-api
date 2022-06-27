<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class RentalUnitsPromotionsRequest extends CollectionRequest
{
    protected $id;

    public function __construct(int $id, ApiAdapter $adapter)
    {
        $this->id = $id;
        parent::__construct($adapter);
    }

    public function getEndpoint(): string
    {
        return 'rentalunits/' . $this->id . '/promotions';
    }

    public function period(int $period_id): RentalUnitsPromotionsRequest
    {
        $this->_data['rentalunitperiodid'] = $period_id ? 1 : 0;
        return $this;
    }
}
