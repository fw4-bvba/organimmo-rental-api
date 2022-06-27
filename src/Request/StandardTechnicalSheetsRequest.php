<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class StandardTechnicalSheetsRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'standardtechnicalsheets';

    /**
     * Get the rental unit periods for a specific standard period.
     *
     * @param int $standard_technical_sheet_id
     */
    public function technicalSheets(int $standard_technical_sheet_id): StandardTechnicalSheetTechnicalSheetsRequest
    {
        return new StandardTechnicalSheetTechnicalSheetsRequest($standard_technical_sheet_id, $this->adapter);
    }
}
