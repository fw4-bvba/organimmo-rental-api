<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class PeriodTypesRequest extends CollectionRequest
{
    const ENDPOINT = 'periodtypes';
    
    public function get(?int $id = null)
    {
        if (isset($id)) {
            return $this->getChildResponse(new PeriodTypeRequest($id, $this->adapter));
        } else {
            return parent::get();
        }
    }
    
    public function formulas(int $period_type_id): PeriodTypeFormulasRequest
    {
        return new PeriodTypeFormulasRequest($period_type_id, $this->adapter);
    }
}
