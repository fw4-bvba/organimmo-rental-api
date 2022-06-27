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
use Organimmo\Rental\Request\SimpleCollectionRequest;
use Organimmo\Rental\Request\CollectionRequest;
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
     * Get the general ledger accounts defined by the agency that can be used in
     * booking transactions.
     */
    public function accounts(): CollectionRequest
    {
        return new SimpleCollectionRequest('accounts', $this->getApiAdapter());
    }

    /**
     * Get actionshape communications
     */
    public function actionshapeCommunications(): CollectionRequest
    {
        return new SimpleCollectionRequest('actionshapecommunications', $this->getApiAdapter());
    }

    /**
     * Get actionshapes
     */
    public function actionshapes(): CollectionRequest
    {
        return new Request\ActionshapesRequest($this->getApiAdapter());
    }

    /**
     * Get assignment follow-ups
     */
    public function assignmentFollowUps(): CollectionRequest
    {
        return new SimpleCollectionRequest('assignmentfollowups', $this->getApiAdapter());
    }

    /**
     * Get assignment origins
     */
    public function assignmentOrigins(): CollectionRequest
    {
        return new SimpleCollectionRequest('assignmentorigins', $this->getApiAdapter());
    }

    /**
     * Get assignment photos
     */
    public function assignmentPhotos(): CollectionRequest
    {
        return new SimpleCollectionRequest('assignmentphotos', $this->getApiAdapter());
    }

    /**
     * Get assignments
     */
    public function assignments(): CollectionRequest
    {
        return new SimpleCollectionRequest('assignments', $this->getApiAdapter());
    }

    /**
     * Get the banks (financial institutions) defined by the agency.
     */
    public function bankingAuthorities(): CollectionRequest
    {
        return new SimpleCollectionRequest('bankingauthorities', $this->getApiAdapter());
    }

    /**
     * Get the utility-meters that are available per building.
     */
    public function buildingCounters(): CollectionRequest
    {
        return new SimpleCollectionRequest('buildingcounters', $this->getApiAdapter());
    }

    /**
     * Get the categories that are used by the agency to cluster the defined
     * buildings.
     */
    public function buildingGroups(): CollectionRequest
    {
        return new SimpleCollectionRequest('buildinggroups', $this->getApiAdapter());
    }

    /**
     * Get the buildings that house the rental units defined by the agency.
     */
    public function buildings(): CollectionRequest
    {
        return new Request\BuildingsRequest($this->getApiAdapter());
    }

    /**
     * Get the calendar years defined by the agency.
     */
    public function calendarYears(): CollectionRequest
    {
        return new SimpleCollectionRequest('calendaryears', $this->getApiAdapter());
    }

    /**
     * Get cities defined by the agency.
     */
    public function cities(): CollectionRequest
    {
        return new SimpleCollectionRequest('cities', $this->getApiAdapter());
    }

    /**
     * Get the items that can be used to calculate the total cost defined by the
     * agency.
     */
    public function costPriceFactors(): CollectionRequest
    {
        return new SimpleCollectionRequest('costpricefactors', $this->getApiAdapter());
    }

    /**
     * Get the main groups of cost components defined by the agency.
     */
    public function costPriceFactorTypes(): CollectionRequest
    {
        return new SimpleCollectionRequest('costpricefactortypes', $this->getApiAdapter());
    }

    /**
     * Get countries defined by the agency.
     */
    public function countries(): CollectionRequest
    {
        return new SimpleCollectionRequest('countries', $this->getApiAdapter());
    }

    /**
     * Get the currency units and their exchange rates defined by the agency.
     */
    public function currencies(): CollectionRequest
    {
        return new SimpleCollectionRequest('currencies', $this->getApiAdapter());
    }

    /**
     * Get additional information of the contact persons for the customer.
     */
    public function customerContacts(): CollectionRequest
    {
        return new Request\CustomerContactsRequest($this->getApiAdapter());
    }

    /**
     * Get additional information for the customer.
     */
    public function customerInfos(): CollectionRequest
    {
        return new SimpleCollectionRequest('customerinfos', $this->getApiAdapter());
    }

    /**
     * Get the customers defined by the agency.
     */
    public function customers(): CollectionRequest
    {
        return new Request\CustomersRequest($this->getApiAdapter());
    }

    /**
     * Get the different shifts defined by the agency.
     */
    public function dayparts(): CollectionRequest
    {
        return new SimpleCollectionRequest('dayparts', $this->getApiAdapter());
    }

    /**
     * Get the different price calculations per period based on a defined month
     * with the possibility to add price variance based on seasons and/or
     * property types.
     */
    public function formulas(): CollectionRequest
    {
        return new SimpleCollectionRequest('formulas', $this->getApiAdapter());
    }

    /**
     * Get key locations
     */
    public function keyLocations(): CollectionRequest
    {
        return new SimpleCollectionRequest('keylocations', $this->getApiAdapter());
    }

    /**
     * Get a list of keys
     */
    public function keys(): CollectionRequest
    {
        return new SimpleCollectionRequest('keys', $this->getApiAdapter());
    }

    /**
     * Get the property types defined by the agency.
     */
    public function kinds(): CollectionRequest
    {
        return new Request\KindsRequest($this->getApiAdapter());
    }

    /**
     * Get the list of loan details
     */
    public function loanDetails(): CollectionRequest
    {
        return new SimpleCollectionRequest('loandetails', $this->getApiAdapter());
    }

    /**
     * Get the list of loans
     */
    public function loans(): CollectionRequest
    {
        return new SimpleCollectionRequest('loans', $this->getApiAdapter());
    }

    /**
     * Get the list of location media-links
     */
    public function locationMediaLinks(): CollectionRequest
    {
        return new SimpleCollectionRequest('locationmedialinks', $this->getApiAdapter());
    }

    /**
     * Get geographical sites defined by the agency. A location can be linked to
     * a rental unit.
     */
    public function locations(): CollectionRequest
    {
        return new SimpleCollectionRequest('locations', $this->getApiAdapter());
    }

    /**
     * Get the list of media
     */
    public function media(): CollectionRequest
    {
        return new SimpleCollectionRequest('media', $this->getApiAdapter());
    }

    /**
     * Get the list of media links
     */
    public function mediaLinks(): CollectionRequest
    {
        return new SimpleCollectionRequest('medialinks', $this->getApiAdapter());
    }

    /**
     * Get the branches defined by the agency.
     */
    public function officeLocations(): CollectionRequest
    {
        return new SimpleCollectionRequest('officelocations', $this->getApiAdapter());
    }

    /**
     * Get the list of option media links
     */
    public function optionMediaLinks(): CollectionRequest
    {
        return new SimpleCollectionRequest('optionmedialinks', $this->getApiAdapter());
    }

    /**
     * Get the amenities defined by the agency. These facilities can be linked
     * to a rental unit.
     */
    public function options(): CollectionRequest
    {
        return new SimpleCollectionRequest('options', $this->getApiAdapter());
    }

    /**
     * Get the definition for the rental terms and the relation between
     * different time periods.
     */
    public function periodTypes(): CollectionRequest
    {
        return new Request\PeriodTypesRequest($this->getApiAdapter());
    }

    /**
     * Get the possible entities for a property, as defined by the agency.
     */
    public function places(): CollectionRequest
    {
        return new SimpleCollectionRequest('places', $this->getApiAdapter());
    }

    /**
     * Get the list of promotions
     */
    public function promotions(): CollectionRequest
    {
        return new Request\PromotionsRequest($this->getApiAdapter());
    }

    /**
     * Get the evaluation system defined by the agency.
     */
    public function ratings(): CollectionRequest
    {
        return new SimpleCollectionRequest('ratings', $this->getApiAdapter());
    }

    /**
     * Get the items used to calculate the total rental cost for the rental
     * unit.
     */
    public function rentalUnitCostPriceFactors(): CollectionRequest
    {
        return new SimpleCollectionRequest('rentalunitcostpricefactors', $this->getApiAdapter());
    }

    /**
     * Get the occupation of a rental unit during day parts.
     */
    public function rentalUnitDayPartOccupations(): CollectionRequest
    {
        return new SimpleCollectionRequest('rentalunitdaypartoccupations', $this->getApiAdapter());
    }

    /**
     * Get the applicable guarantees for the rental unit.
     */
    public function rentalUnitGuarantees(): CollectionRequest
    {
        return new SimpleCollectionRequest('rentalunitguarantees', $this->getApiAdapter());
    }

    /**
     * Get the list of rental unit media
     */
    public function rentalUnitMedia(): CollectionRequest
    {
        return new Request\RentalUnitMediaRequest($this->getApiAdapter());
    }

    /**
     * Get the amenities for the rental unit.
     */
    public function rentalUnitOptions(): CollectionRequest
    {
        return new SimpleCollectionRequest('rentalunitoptions', $this->getApiAdapter());
    }

    /**
     * Get the periods in which rental is possible, with corresponding price.
     */
    public function rentalUnitPeriods(?bool $available_only = null, ?bool $include_promotions = null): CollectionRequest
    {
        $request = new Request\RentalUnitPeriodsRequest($this->getApiAdapter());
        if (isset($available_only)) $request->availableOnly($available_only);
        if (isset($include_promotions)) $request->includePromotions($include_promotions);
        return $request;
    }

    /**
     * Get the pictures per rental unit.
     */
    public function rentalUnitPhotos(): CollectionRequest
    {
        return new Request\RentalUnitPhotosRequest($this->getApiAdapter());
    }

    /**
     * Get the rooms in a certain rental unit.
     */
    public function rentalUnitPlaces(): CollectionRequest
    {
        return new Request\RentalUnitPlacesRequest($this->getApiAdapter());
    }

    /**
     * Get the entities subjected to rental defined by the agency.
     */
    public function rentalUnits(): CollectionRequest
    {
        return new Request\RentalUnitsRequest($this->getApiAdapter());
    }

    /**
     * Get the different routes based on a procedure defined by the agency.
     */
    public function routes(): CollectionRequest
    {
        return new SimpleCollectionRequest('routes', $this->getApiAdapter());
    }

    /**
     * Get honorifics (titles) defined by the agency.
     */
    public function salutations(): CollectionRequest
    {
        return new SimpleCollectionRequest('salutations', $this->getApiAdapter());
    }

    /**
     * Get the seasons defined by the agency.
     */
    public function seasons(): CollectionRequest
    {
        return new SimpleCollectionRequest('seasons', $this->getApiAdapter());
    }

    /**
     * Get the specification details defined by the agency.
     */
    public function specificationDetails(): CollectionRequest
    {
        return new SimpleCollectionRequest('specificationdetails', $this->getApiAdapter());
    }

    /**
     * Get the specifications defined by the agency.
     */
    public function specifications(): CollectionRequest
    {
        return new SimpleCollectionRequest('specifications', $this->getApiAdapter());
    }

    /**
     * Get the booking scheme for frequent costs defined by the agency.
     */
    public function standardCosts(): CollectionRequest
    {
        return new SimpleCollectionRequest('standardcosts', $this->getApiAdapter());
    }

    /**
     * Get the meters to be used for calculating the consumption of utilities
     * defined by the agency.
     */
    public function standardCounters(): CollectionRequest
    {
        return new SimpleCollectionRequest('standardcounters', $this->getApiAdapter());
    }

    /**
     * Get the most common amounts of rental guarantee defined by the agency.
     */
    public function standardGuarantees(): CollectionRequest
    {
        return new SimpleCollectionRequest('standardguarantees', $this->getApiAdapter());
    }

    /**
     * Get the general information-fields that can be mentioned on a proposal,
     * reservation, arrival, departure and meter-form. Standard info is defined
     * by the agency.
     */
    public function standardInfos(): CollectionRequest
    {
        return new SimpleCollectionRequest('standardinfos', $this->getApiAdapter());
    }

    /**
     * Get predefined periods with the corresponding price. These periodes
     * reflect the agency's general rental behavior. Rental other than within
     * the standard periods remains possible.
     */
    public function standardPeriods(): CollectionRequest
    {
        return new Request\StandardPeriodsRequest($this->getApiAdapter());
    }

    /**
     * Get the general technical information templates defined by the agency.
     */
    public function standardTechnicalSheets(): CollectionRequest
    {
        return new Request\StandardTechnicalSheetsRequest($this->getApiAdapter());
    }

    /**
     * Get the subkind media links defined by the agency.
     */
    public function subKindMediaLinks(): CollectionRequest
    {
        return new SimpleCollectionRequest('subkindmedialinks', $this->getApiAdapter());
    }

    /**
     * Get the property type variety defined by the agency.
     */
    public function subkinds(): CollectionRequest
    {
        return new SimpleCollectionRequest('subkinds', $this->getApiAdapter());
    }

    /**
     * Get the supplier building settings defined by the agency.
     */
    public function supplierBuildingSettings(): CollectionRequest
    {
        return new SimpleCollectionRequest('supplierbuildingsettings', $this->getApiAdapter());
    }

    /**
     * Get additional information of the contact persons for the supplier.
     */
    public function supplierContacts(): CollectionRequest
    {
        return new Request\SupplierContactsRequest($this->getApiAdapter());
    }

    /**
     * Get the supplier-categories that can be used to group suppliers based on
     * their line of work.
     */
    public function supplierGroups(): CollectionRequest
    {
        return new Request\SupplierGroupsRequest($this->getApiAdapter());
    }

    public function supplierGroupSuppliers(): CollectionRequest
    {
        return new SimpleCollectionRequest('suppliergroupsuppliers', $this->getApiAdapter());
    }

    /**
     * Get the suppliers defined by the agency.
     */
    public function suppliers(): CollectionRequest
    {
        return new Request\SuppliersRequest($this->getApiAdapter());
    }

    /**
     * Get the technical sheets defined by the agency.
     */
    public function technicalSheets(): CollectionRequest
    {
        return new SimpleCollectionRequest('technicalsheets', $this->getApiAdapter());
    }

    /**
     * Get the users of the agency account.
     */
    public function users(): CollectionRequest
    {
        return new SimpleCollectionRequest('users', $this->getApiAdapter());
    }

    /**
     * Get the VAT-tax rates defined by the agency.
     */
    public function vatRates(): CollectionRequest
    {
        return new SimpleCollectionRequest('vatrates', $this->getApiAdapter());
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
