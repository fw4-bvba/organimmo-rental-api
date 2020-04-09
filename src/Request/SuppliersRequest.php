<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class SuppliersRequest extends CollectionRequest
{
    const ENDPOINT = 'suppliers';
    
    public function get(?int $id = null)
    {
        if (isset($id)) {
            return $this->getChildResponse(new SupplierRequest($id, $this->adapter));
        } else {
            return parent::get();
        }
    }
    
    /**
     * Get the contacts for a specific supplier using ID.
     *
     * @param int $supplier_id
     */
    public function contacts(int $supplier_id): SuppliersContactsRequest
    {
        return new SuppliersContactsRequest($supplier_id, $this->adapter);
    }
    
    /**
     * Get the groups for a specific supplier using ID.
     *
     * @param int $supplier_id
     */
    public function groups(int $supplier_id): SuppliersGroupsRequest
    {
        return new SuppliersGroupsRequest($supplier_id, $this->adapter);
    }
    
    /**
     * Get the building settings for a specific supplier using ID.
     *
     * @param int $supplier_id
     */
    public function buildingSettings(int $supplier_id): SuppliersBuildingSettingsRequest
    {
        return new SuppliersBuildingSettingsRequest($supplier_id, $this->adapter);
    }
}
