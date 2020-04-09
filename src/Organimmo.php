<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental;

use League\OAuth2\Client\Token\AccessTokenInterface;
use Organimmo\Rental\Response\{Response, PaginatedResponse};
use Organimmo\Rental\Request;
use Organimmo\Rental\ApiAdapter\ApiAdapterInterface;
use Organimmo\Rental\ApiAdapter\HttpApiAdapter;

final class Organimmo
{
    private $customerId;
    private $apiAdapter;
    
    public function __construct(string $customer_id)
    {
        $this->customerId = $customer_id;
    }
    
    /**
     * Get countries defined by the agency.
     */
    public function countries(): Request\CountriesRequest
    {
        return new Request\CountriesRequest($this->getApiAdapter());
    }
    
    /**
     * Get cities defined by the agency.
     */
    public function cities(): Request\CitiesRequest
    {
        return new Request\CitiesRequest($this->getApiAdapter());
    }
    
    /**
     * Get honorifics (titles) defined by the agency.
     */
    public function salutations(): Request\SalutationsRequest
    {
        return new Request\SalutationsRequest($this->getApiAdapter());
    }
    
    /**
     * Get geographical sites defined by the agency. A location can be linked to
     * a rental unit.
     */
    public function locations(): Request\LocationsRequest
    {
        return new Request\LocationsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the possible entities for a property, as defined by the agency.
     */
    public function places(): Request\PlacesRequest
    {
        return new Request\PlacesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the different shifts defined by the agency.
     */
    public function dayparts(): Request\DaypartsRequest
    {
        return new Request\DaypartsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the seasons defined by the agency.
     */
    public function seasons(): Request\SeasonsRequest
    {
        return new Request\SeasonsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the calendar years defined by the agency.
     */
    public function calendarYears(): Request\CalendarYearsRequest
    {
        return new Request\CalendarYearsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the property types defined by the agency.
     */
    public function kinds(): Request\KindsRequest
    {
        return new Request\KindsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the property type variety defined by the agency.
     */
    public function subkinds(): Request\SubkindsRequest
    {
        return new Request\SubkindsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the currency units and their exchange rates defined by the agency.
     */
    public function currencies(): Request\CurrenciesRequest
    {
        return new Request\CurrenciesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the VAT-tax rates defined by the agency.
     */
    public function vatRates(): Request\VatRatesRequest
    {
        return new Request\VatRatesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the evaluation system defined by the agency.
     */
    public function ratings(): Request\RatingsRequest
    {
        return new Request\RatingsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the amenities defined by the agency. These facilities can be linked
     * to a rental unit.
     */
    public function options(): Request\OptionsRequest
    {
        return new Request\OptionsRequest($this->getApiAdapter());
    }
    
    /**
     * Get predefined periods with the corresponding price. These periodes
     * reflect the agency's general rental behavior. Rental other than within
     * the standard periods remains possible.
     */
    public function standardPeriods(): Request\StandardPeriodsRequest
    {
        return new Request\StandardPeriodsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the definition for the rental terms and the relation between
     * different time periods.
     */
    public function periodTypes(): Request\PeriodTypesRequest
    {
        return new Request\PeriodTypesRequest($this->getApiAdapter());
    }
    
    /**
     * Get actionshapes
     */
    public function actionshapes(): Request\ActionshapesRequest
    {
        return new Request\ActionshapesRequest($this->getApiAdapter());
    }
    
    /**
     * Get actionshape communications
     */
    public function actionshapeCommunications(): Request\ActionshapeCommunicationsRequest
    {
        return new Request\ActionshapeCommunicationsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the branches defined by the agency.
     */
    public function officeLocations(): Request\OfficeLocationsRequest
    {
        return new Request\OfficeLocationsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the different routes based on a procedure defined by the agency.
     */
    public function routes(): Request\RoutesRequest
    {
        return new Request\RoutesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the banks (financial institutions) defined by the agency.
     */
    public function bankingAuthorities(): Request\BankingAuthoritiesRequest
    {
        return new Request\BankingAuthoritiesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the items that can be used to calculate the total cost defined by the
     * agency.
     */
    public function costPriceFactors(): Request\CostPriceFactorsRequest
    {
        return new Request\CostPriceFactorsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the main groups of cost components defined by the agency.
     */
    public function costPriceFactorTypes(): Request\CostPriceFactorTypesRequest
    {
        return new Request\CostPriceFactorTypesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the general ledger accounts defined by the agency that can be used in
     * booking transactions.
     */
    public function accounts(): Request\AccountsRequest
    {
        return new Request\AccountsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the booking scheme for frequent costs defined by the agency.
     */
    public function standardCosts(): Request\StandardCostsRequest
    {
        return new Request\StandardCostsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the meters to be used for calculating the consumption of utilities
     * defined by the agency.
     */
    public function standardCounters(): Request\StandardCountersRequest
    {
        return new Request\StandardCountersRequest($this->getApiAdapter());
    }
    
    /**
     * Get the most common amounts of rental guarantee defined by the agency.
     */
    public function standardGuarantees(): Request\StandardGuaranteesRequest
    {
        return new Request\StandardGuaranteesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the general information-fields that can be mentioned on a proposal,
     * reservation, arrival, departure and meter-form. Standard info is defined
     * by the agency.
     */
    public function standardInfos(): Request\StandardInfosRequest
    {
        return new Request\StandardInfosRequest($this->getApiAdapter());
    }
    
    /**
     * Get the different price calculations per period based on a defined month
     * with the possibility to add price variance based on seasons and/or
     * property types.
     */
    public function formulas(): Request\FormulasRequest
    {
        return new Request\FormulasRequest($this->getApiAdapter());
    }
    
    /**
     * Get the general technical information templates defined by the agency.
     */
    public function standardTechnicalSheets(): Request\StandardTechnicalSheetsRequest
    {
        return new Request\StandardTechnicalSheetsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the buildings that house the rental units defined by the agency.
     */
    public function buildings(): Request\BuildingsRequest
    {
        return new Request\BuildingsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the utility-meters that are available per building.
     */
    public function buildingCounters(): Request\BuildingCountersRequest
    {
        return new Request\BuildingCountersRequest($this->getApiAdapter());
    }
    
    /**
     * Get the categories that are used by the agency to cluster the defined
     * buildings.
     */
    public function buildingGroups(): Request\BuildingGroupsRequest
    {
        return new Request\BuildingGroupsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the entities subjected to rental defined by the agency.
     */
    public function rentalUnits(): Request\RentalUnitsRequest
    {
        return new Request\RentalUnitsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the rooms in a certain rental unit.
     */
    public function rentalUnitPlaces(): Request\RentalUnitPlacesRequest
    {
        return new Request\RentalUnitPlacesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the pictures per rental unit.
     */
    public function rentalUnitPhotos(): Request\RentalUnitPhotosRequest
    {
        return new Request\RentalUnitPhotosRequest($this->getApiAdapter());
    }
    
    /**
     * Get the periods in which rental is possible, with corresponding price.
     */
    public function rentalUnitPeriods(?bool $available_only = null, ?bool $include_promotions = null): Request\RentalUnitPeriodsRequest
    {
        $request = new Request\RentalUnitPeriodsRequest($this->getApiAdapter());
        if (isset($available_only)) $request->availableOnly($available_only);
        if (isset($include_promotions)) $request->includePromotions($include_promotions);
        return $request;
    }
    
    /**
     * Get the amenities for the rental unit.
     */
    public function rentalUnitOptions(): Request\RentalUnitOptionsRequest
    {
        return new Request\RentalUnitOptionsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the applicable guarantees for the rental unit.
     */
    public function rentalUnitGuarantees(): Request\RentalUnitGuaranteesRequest
    {
        return new Request\RentalUnitGuaranteesRequest($this->getApiAdapter());
    }
    
    /**
     * Get the items used to calculate the total rental cost for the rental
     * unit.
     */
    public function rentalUnitCostPriceFactors(): Request\RentalUnitCostPriceFactorsRequest
    {
        return new Request\RentalUnitCostPriceFactorsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the customers defined by the agency.
     */
    public function customers(): Request\CustomersRequest
    {
        return new Request\CustomersRequest($this->getApiAdapter());
    }
    
    /**
     * Get additional information of the contact persons for the customer.
     */
    public function customerContacts(): Request\CustomerContactsRequest
    {
        return new Request\CustomerContactsRequest($this->getApiAdapter());
    }
    
    public function customerInfos(): Request\CustomerInfosRequest
    {
        return new Request\CustomerInfosRequest($this->getApiAdapter());
    }
    
    /**
     * Get the suppliers defined by the agency.
     */
    public function suppliers(): Request\SuppliersRequest
    {
        return new Request\SuppliersRequest($this->getApiAdapter());
    }
    
    /**
     * Get the supplier-categories that can be used to group suppliers based on
     * their line of work.
     */
    public function supplierGroups(): Request\SupplierGroupsRequest
    {
        return new Request\SupplierGroupsRequest($this->getApiAdapter());
    }
    
    /**
     * Get the supplier building settings defined by the agency.
     */
    public function supplierBuildingSettings(): Request\SupplierBuildingSettingsRequest
    {
        return new Request\SupplierBuildingSettingsRequest($this->getApiAdapter());
    }
    
    /**
     * Get additional information of the contact persons for the supplier.
     */
    public function supplierContacts(): Request\SupplierContactsRequest
    {
        return new Request\SupplierContactsRequest($this->getApiAdapter());
    }
    
    public function supplierGroupSuppliers(): Request\SupplierGroupSuppliersRequest
    {
        return new Request\SupplierGroupSuppliersRequest($this->getApiAdapter());
    }
    
    /**
     * Get the occupation of a rental unit during day parts.
     */
    public function rentalUnitDayPartOccupations(): Request\RentalUnitDayPartOccupationsRequest
    {
        return new Request\RentalUnitDayPartOccupationsRequest($this->getApiAdapter());
    }
    
    // Access token
    
    /**
     * Reuse a previously requested access token.
     *
     * @param League\OAuth2\Client\Token\AccessTokenInterface $token
     */
    public function setAccessToken(AccessTokenInterface $token): void
    {
        $this->getApiAdapter()->setAccessToken($token);
    }
    
    /**
     * Request a new access token using client credentials.
     *
     * @param string $client_id
     * @param string $client_secret
     */
    public function requestAccessToken(string $client_id, string $client_secret, string $username, string $password): AccessTokenInterface
    {
        return $this->getApiAdapter()->requestAccessToken($client_id, $client_secret, $username, $password);
    }
    
    // Api adapter
    
    public function setApiAdapter(ApiAdapterInterface $adapter): void
    {
        $this->apiAdapter = $adapter;
    }
    
    private function getApiAdapter(): ApiAdapterInterface
    {
        if (!isset($this->apiAdapter)) {
            $this->apiAdapter = new HttpApiAdapter($this->customerId);
        }
        return $this->apiAdapter;
    }
}
