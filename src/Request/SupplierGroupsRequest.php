<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class SupplierGroupsRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'suppliergroups';

    /**
     * Get the suppliers belonging to a specific group.
     *
     * @param int $group_id
     */
    public function suppliers(int $group_id): SupplierGroupSuppliersRequest
    {
        return new SupplierGroupSuppliersRequest($group_id, $this->adapter);
    }
}
