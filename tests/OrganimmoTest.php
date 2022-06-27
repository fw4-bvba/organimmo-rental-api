<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Tests;

use PHPUnit\Framework\TestCase;
use Organimmo\Rental\Organimmo;
use Organimmo\Rental\Request;
use Organimmo\Rental\Exception\InvalidDataException;

class OrganimmoTest extends TestCase
{
    protected $api;
    protected $adapter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adapter = new TestApiAdapter();
        $this->api = new Organimmo('');
        $this->api->setApiAdapter($this->adapter);
    }

    public function testAccounts()
    {
        $this->adapter->queueResponseFromFile('accounts.json');
        $items = $this->api->accounts()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(5, $items->count());

        $this->assertSame(398, $item->id);
    }

    public function testAccount()
    {
        $this->adapter->queueResponseFromFile('account.json');
        $item = $this->api->accounts()->get(398);

        $this->assertSame(398, $item->id);
    }

    public function testActionshapeCommunications()
    {
        $this->adapter->queueResponseFromFile('actionshapecommunications.json');
        $items = $this->api->actionshapeCommunications()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testActionshapeCommunication()
    {
        $this->adapter->queueResponseFromFile('actionshapecommunication.json');
        $item = $this->api->actionshapeCommunications()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testActionshapes()
    {
        $this->adapter->queueResponseFromFile('actionshapes.json');
        $items = $this->api->actionshapes()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testActionshape()
    {
        $this->adapter->queueResponseFromFile('actionshape.json');
        $item = $this->api->actionshapes()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testActionshapeSubCommunications()
    {
        $this->adapter->queueResponseFromFile('actionshapecommunications.json');
        $items = $this->api->actionshapes()->communications(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testAssignmentFollowUps()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->assignmentFollowUps()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testAssignmentOrigins()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->assignmentOrigins()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testAssignmentPhotos()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->assignmentPhotos()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testAssignments()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->assignments()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testBankingAuthorities()
    {
        $this->adapter->queueResponseFromFile('bankingauthorities.json');
        $items = $this->api->bankingAuthorities()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testBankingAuthority()
    {
        $this->adapter->queueResponseFromFile('bankingauthority.json');
        $item = $this->api->bankingAuthorities()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testBuildingCounters()
    {
        $this->adapter->queueResponseFromFile('buildingcounters.json');
        $items = $this->api->buildingCounters()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testBuildingCounter()
    {
        $this->adapter->queueResponseFromFile('buildingcounter.json');
        $item = $this->api->buildingCounters()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testBuildingGroups()
    {
        $this->adapter->queueResponseFromFile('buildinggroups.json');
        $items = $this->api->buildingGroups()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(4, $item->id);
    }

    public function testBuildingGroup()
    {
        $this->adapter->queueResponseFromFile('buildinggroup.json');
        $item = $this->api->buildingGroups()->get(4);

        $this->assertSame(4, $item->id);
    }

    public function testBuildings()
    {
        $this->adapter->queueResponseFromFile('buildings.json');
        $items = $this->api->buildings()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testBuilding()
    {
        $this->adapter->queueResponseFromFile('building.json');
        $item = $this->api->buildings()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testBuildingRentalUnits()
    {
        $this->adapter->queueResponseFromFile('rentalunits.json');
        $items = $this->api->buildings()->rentalUnits(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(8, $item->id);
    }

    public function testBuildingRentalUnitsOptions()
    {
        $this->adapter->queueResponseFromFile('rentalunitoptions.json');
        $items = $this->api->buildings()->rentalUnits(1)->options(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testBuildingBuildingCounters()
    {
        $this->adapter->queueResponseFromFile('buildingcounters.json');
        $items = $this->api->buildings()->counters(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testCalendarYears()
    {
        $this->adapter->queueResponseFromFile('calendaryears.json');
        $items = $this->api->calendarYears()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testCalendarYear()
    {
        $this->adapter->queueResponseFromFile('calendaryear.json');
        $item = $this->api->calendarYears()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testCities()
    {
        $this->adapter->queueResponseFromFile('cities.json');
        $items = $this->api->cities()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testCity()
    {
        $this->adapter->queueResponseFromFile('city.json');
        $item = $this->api->cities()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testCostPriceFactors()
    {
        $this->adapter->queueResponseFromFile('costpricefactors.json');
        $items = $this->api->costPriceFactors()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(4, $item->id);
    }

    public function testCostPriceFactor()
    {
        $this->adapter->queueResponseFromFile('costpricefactor.json');
        $item = $this->api->costPriceFactors()->get(4);

        $this->assertSame(4, $item->id);
    }

    public function testCostPriceFactorTypes()
    {
        $this->adapter->queueResponseFromFile('costpricefactortypes.json');
        $items = $this->api->costPriceFactorTypes()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(4, $item->id);
    }

    public function testCostPriceFactorType()
    {
        $this->adapter->queueResponseFromFile('costpricefactortype.json');
        $item = $this->api->costPriceFactorTypes()->get(4);

        $this->assertSame(4, $item->id);
    }

    public function testCountries()
    {
        $this->adapter->queueResponseFromFile('countries.json');
        $items = $this->api->countries()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(31, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testCountry()
    {
        $this->adapter->queueResponseFromFile('country.json');
        $item = $this->api->countries()->get(1);

        $this->assertSame(1, $item->id);
    }


    public function testCurrencies()
    {
        $this->adapter->queueResponseFromFile('currencies.json');
        $items = $this->api->currencies()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testCurrency()
    {
        $this->adapter->queueResponseFromFile('currency.json');
        $item = $this->api->currencies()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testCustomerContacts()
    {
        $this->adapter->queueResponseFromFile('customercontacts.json');
        $items = $this->api->customerContacts()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testCustomerContact()
    {
        $this->adapter->queueResponseFromFile('customercontact.json');
        $item = $this->api->customerContacts()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testCustomerInfos()
    {
        $this->adapter->queueResponseFromFile('customerinfos.json');
        $items = $this->api->customerInfos()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(2, $item->id);
    }

    public function testCustomerInfo()
    {
        $this->adapter->queueResponseFromFile('customerinfo.json');
        $item = $this->api->customerInfos()->get(2);

        $this->assertSame(2, $item->id);
    }

    public function testCustomers()
    {
        $this->adapter->queueResponseFromFile('customers.json');
        $items = $this->api->customers()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(21, $items->count());

        $this->assertSame(2, $item->id);
    }

    public function testCustomer()
    {
        $this->adapter->queueResponseFromFile('customer.json');
        $item = $this->api->customers()->get(2);

        $this->assertSame(2, $item->id);
    }

    public function testDayparts()
    {
        $this->adapter->queueResponseFromFile('dayparts.json');
        $items = $this->api->dayparts()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(2, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testDaypart()
    {
        $this->adapter->queueResponseFromFile('daypart.json');
        $item = $this->api->dayparts()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testFormulas()
    {
        $this->adapter->queueResponseFromFile('formulas.json');
        $items = $this->api->formulas()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testFormula()
    {
        $this->adapter->queueResponseFromFile('formula.json');
        $item = $this->api->formulas()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testKeyLocations()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->keyLocations()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testKeyLocation()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->keyLocations()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testKeys()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->keys()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testKey()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->keys()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testKinds()
    {
        $this->adapter->queueResponseFromFile('kinds.json');
        $items = $this->api->kinds()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(2, $item->id);
    }

    public function testKind()
    {
        $this->adapter->queueResponseFromFile('kind.json');
        $item = $this->api->kinds()->get(2);

        $this->assertSame(2, $item->id);
    }

    public function testKindSubkinds()
    {
        $this->adapter->queueResponseFromFile('kindsubkind.json');
        $items = $this->api->kinds()->subkinds(2)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testLoanDetails()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->loanDetails()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testLoanDetail()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->loanDetails()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testLoans()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->loans()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testLoan()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->loans()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testLocationMediaLinks()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->locationMediaLinks()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testLocationMediaLink()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->locationMediaLinks()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testLocations()
    {
        $this->adapter->queueResponseFromFile('locations.json');
        $items = $this->api->locations()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testLocation()
    {
        $this->adapter->queueResponseFromFile('location.json');
        $item = $this->api->locations()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testMedia()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->media()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testMediaItem()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->media()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testMediaLinks()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->mediaLinks()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testMediaLink()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->mediaLinks()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testOfficeLocations()
    {
        $this->adapter->queueResponseFromFile('officelocations.json');
        $items = $this->api->officeLocations()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(3, $item->id);
    }

    public function testOfficeLocation()
    {
        $this->adapter->queueResponseFromFile('officelocation.json');
        $item = $this->api->officeLocations()->get(3);

        $this->assertSame(3, $item->id);
    }

    public function testOptionMediaLinks()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->optionMediaLinks()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testOptionMediaLink()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->optionMediaLinks()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testOptions()
    {
        $this->adapter->queueResponseFromFile('options.json');
        $items = $this->api->options()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testOption()
    {
        $this->adapter->queueResponseFromFile('option.json');
        $item = $this->api->options()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testPeriodTypes()
    {
        $this->adapter->queueResponseFromFile('periodtypes.json');
        $items = $this->api->periodTypes()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testPeriodType()
    {
        $this->adapter->queueResponseFromFile('periodtype.json');
        $item = $this->api->periodTypes()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testPeriodTypeFormulas()
    {
        $this->adapter->queueResponseFromFile('periodtypeformulas.json');
        $items = $this->api->periodTypes()->formulas(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(16, $item->id);
    }

    public function testPlaces()
    {
        $this->adapter->queueResponseFromFile('places.json');
        $items = $this->api->places()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testPlace()
    {
        $this->adapter->queueResponseFromFile('place.json');
        $item = $this->api->places()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testPromotions()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->promotions()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRatings()
    {
        $this->adapter->queueResponseFromFile('ratings.json');
        $items = $this->api->ratings()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRating()
    {
        $this->adapter->queueResponseFromFile('rating.json');
        $item = $this->api->ratings()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitCostPriceFactors()
    {
        $this->adapter->queueResponseFromFile('rentalunitcostfactors.json');
        $items = $this->api->rentalUnitCostPriceFactors()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(18, $item->id);
    }

    public function testRentalUnitCostPriceFactor()
    {
        $this->adapter->queueResponseFromFile('rentalunitcostfactor.json');
        $item = $this->api->rentalUnitCostPriceFactors()->get(18);

        $this->assertSame(18, $item->id);
    }

    public function testRentalUnitDayPartOccupations()
    {
        $this->adapter->queueResponseFromFile('daypartoccupations.json');
        $items = $this->api->rentalUnitDayPartOccupations()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(500, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitDayPartOccupation()
    {
        $this->adapter->queueResponseFromFile('daypartoccupation.json');
        $item = $this->api->rentalUnitDayPartOccupations()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitGuarantees()
    {
        $this->adapter->queueResponseFromFile('guarantees.json');
        $items = $this->api->rentalUnitGuarantees()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(2, $item->id);
    }

    public function testRentalUnitGuarantee()
    {
        $this->adapter->queueResponseFromFile('guarantee.json');
        $item = $this->api->rentalUnitGuarantees()->get(2);

        $this->assertSame(2, $item->id);
    }

    public function testRentalUnitMedia()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->rentalUnitMedia()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitOptions()
    {
        $this->adapter->queueResponseFromFile('rentalunitoptions.json');
        $items = $this->api->rentalUnitOptions()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitOption()
    {
        $this->adapter->queueResponseFromFile('rentalunitoption.json');
        $item = $this->api->rentalUnitOptions()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitPeriods()
    {
        $this->adapter->queueResponseFromFile('rentalunitperiods.json');
        $items = $this->api->rentalUnitPeriods()->availableOnly(true)->standardPeriod(10)->includePromotions(true)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitPeriod()
    {
        $this->adapter->queueResponseFromFile('rentalunitperiod.json');
        $item = $this->api->rentalUnitPeriods()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitPeriodPromotions()
    {
        $this->adapter->queueResponseFromFile('rentalunitperiod.json');
        $item = $this->api->rentalUnitPeriods()->includePromotions(true)->get(1);

        $this->assertSame(1, $item->id);
    }


    public function testRentalUnitPhotos()
    {
        $this->adapter->queueResponseFromFile('rentalunitphotos.json');
        $items = $this->api->rentalUnitPhotos()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitPhoto()
    {
        $this->adapter->queueResponseFromFile('rentalunitphoto.json');
        $item = $this->api->rentalUnitPhotos()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitPhotoDownload()
    {
        $this->adapter->queueResponseFromFile('rentalunitphoto.json');
        $item = $this->api->rentalUnitPhotos()->get(1);

        $temp_file = tmpfile();
        $temp_file_path = stream_get_meta_data($temp_file)['uri'];

        $this->adapter->queueResponse('test');
        $item->thumbnailUrl->download($temp_file_path);

        $this->assertSame('test', file_get_contents($temp_file_path));
    }

    public function testRentalUnitPlaces()
    {
        $this->adapter->queueResponseFromFile('rentalunitplaces.json');
        $items = $this->api->rentalUnitPlaces()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(10, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitPlace()
    {
        $this->adapter->queueResponseFromFile('rentalunitplace.json');
        $item = $this->api->rentalUnitPlaces()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitPlaceOptions()
    {
        $this->adapter->queueResponseFromFile('rentalunitplaceoptions.json');
        $items = $this->api->rentalUnitPlaces()->options(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnits()
    {
        $this->adapter->queueResponseFromFile('rentalunits.json');
        $items = $this->api->rentalUnits()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(8, $item->id);
    }

    public function testRentalUnit()
    {
        $this->adapter->queueResponseFromFile('rentalunit.json');
        $item = $this->api->rentalUnits()->get(8);

        $this->assertSame(8, $item->id);
    }

    public function testRentalUnitSubGuarantees()
    {
        $this->adapter->queueResponseFromFile('guarantees.json');
        $items = $this->api->rentalUnits()->guarantees(8)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(2, $item->id);
    }

    public function testRentalUnitSubPeriods()
    {
        $this->adapter->queueResponseFromFile('rentalunitperiods.json');
        $items = $this->api->rentalUnits()->periods(8)->availableOnly(true)->standardPeriod(10)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitSubPlaces()
    {
        $this->adapter->queueResponseFromFile('rentalunitplaces.json');
        $items = $this->api->rentalUnits()->places(8)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(10, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitSubOptions()
    {
        $this->adapter->queueResponseFromFile('rentalunitoptions.json');
        $items = $this->api->rentalUnits()->options(8)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitCostFactors()
    {
        $this->adapter->queueResponseFromFile('rentalunitcostfactors.json');
        $items = $this->api->rentalUnits()->costFactors(8)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(18, $item->id);
    }

    public function testRentalUnitPromotions()
    {
        $this->adapter->queueResponseFromFile('rentalunitpromotions.json');
        $items = $this->api->rentalUnits()->promotions(8)->period(10)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(0, $item->id);
    }

    public function testRentalUnitSubPhotos()
    {
        $this->adapter->queueResponseFromFile('rentalunitphotos.json');
        $items = $this->api->rentalUnits()->photos(8)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRentalUnitSubDayPartOccupations()
    {
        $this->adapter->queueResponseFromFile('daypartoccupations.json');
        $items = $this->api->rentalUnits()->dayPartOccupations(8)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(500, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRoutes()
    {
        $this->adapter->queueResponseFromFile('routes.json');
        $items = $this->api->routes()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testRoute()
    {
        $this->adapter->queueResponseFromFile('route.json');
        $item = $this->api->routes()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSalutations()
    {
        $this->adapter->queueResponseFromFile('salutations.json');
        $items = $this->api->salutations()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSalutation()
    {
        $this->adapter->queueResponseFromFile('salutation.json');
        $item = $this->api->salutations()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSeasons()
    {
        $this->adapter->queueResponseFromFile('seasons.json');
        $items = $this->api->seasons()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(2, $item->id);
    }

    public function testSeason()
    {
        $this->adapter->queueResponseFromFile('season.json');
        $item = $this->api->seasons()->get(2);

        $this->assertSame(2, $item->id);
    }

    public function testSpecificationDetails()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->specificationDetails()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSpecificationDetail()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->specificationDetails()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSpecifications()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->specifications()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSpecification()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->specifications()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testStandardCosts()
    {
        $this->adapter->queueResponseFromFile('standardcosts.json');
        $items = $this->api->standardCosts()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testStandardCost()
    {
        $this->adapter->queueResponseFromFile('standardcost.json');
        $item = $this->api->standardCosts()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testStandardCounters()
    {
        $this->adapter->queueResponseFromFile('standardcounters.json');
        $items = $this->api->standardCounters()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testStandardCounter()
    {
        $this->adapter->queueResponseFromFile('standardcounter.json');
        $item = $this->api->standardCounters()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testStandardGuarantees()
    {
        $this->adapter->queueResponseFromFile('standardguarantees.json');
        $items = $this->api->standardGuarantees()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testStandardGuarantee()
    {
        $this->adapter->queueResponseFromFile('standardguarantee.json');
        $item = $this->api->standardGuarantees()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testStandardInfos()
    {
        $this->adapter->queueResponseFromFile('standardinfos.json');
        $items = $this->api->standardInfos()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testStandardInfo()
    {
        $this->adapter->queueResponseFromFile('standardinfo.json');
        $item = $this->api->standardInfos()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testStandardPeriods()
    {
        $this->adapter->queueResponseFromFile('standardperiods.json');
        $items = $this->api->standardPeriods()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testStandardPeriod()
    {
        $this->adapter->queueResponseFromFile('standardperiod.json');
        $item = $this->api->standardPeriods()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testStandardPeriodSubPeriods()
    {
        $this->adapter->queueResponseFromFile('standardperiods.json');
        $items = $this->api->standardPeriods()->periods(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testStandardTechnicalSheets()
    {
        $this->adapter->queueResponseFromFile('standardtechnicalsheets.json');
        $items = $this->api->standardTechnicalSheets()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testStandardTechnicalSheet()
    {
        $this->adapter->queueResponseFromFile('standardtechnicalsheet.json');
        $item = $this->api->standardTechnicalSheets()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testStandardTechnicalSheetSubTechnicalSheets()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->standardTechnicalSheets()->technicalSheets(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSubKindMediaLinks()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->subKindMediaLinks()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSubKindMediaLink()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->subKindMediaLinks()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSubkinds()
    {
        $this->adapter->queueResponseFromFile('subkinds.json');
        $items = $this->api->subkinds()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(6, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSubkind()
    {
        $this->adapter->queueResponseFromFile('subkind.json');
        $item = $this->api->subkinds()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSupplierBuildingSettings()
    {
        $this->adapter->queueResponseFromFile('supplierbuildingsettings.json');
        $items = $this->api->supplierBuildingSettings()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierBuildingSetting()
    {
        $this->adapter->queueResponseFromFile('supplierbuildingsetting.json');
        $item = $this->api->supplierBuildingSettings()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSupplierContacts()
    {
        $this->adapter->queueResponseFromFile('suppliercontacts.json');
        $items = $this->api->supplierContacts()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierContact()
    {
        $this->adapter->queueResponseFromFile('suppliercontact.json');
        $item = $this->api->supplierContacts()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSupplierGroups()
    {
        $this->adapter->queueResponseFromFile('suppliergroups.json');
        $items = $this->api->supplierGroups()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierGroup()
    {
        $this->adapter->queueResponseFromFile('suppliergroup.json');
        $item = $this->api->supplierGroups()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSupplierGroupSubSuppliers()
    {
        $this->adapter->queueResponseFromFile('suppliergroupsuppliers.json');
        $items = $this->api->supplierGroups()->suppliers(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierGroupSuppliers()
    {
        $this->adapter->queueResponseFromFile('suppliergroupsuppliers.json');
        $items = $this->api->supplierGroupSuppliers()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(4, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierGroupSupplier()
    {
        $this->adapter->queueResponseFromFile('suppliergroupsupplier.json');
        $item = $this->api->supplierGroupSuppliers()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSuppliers()
    {
        $this->adapter->queueResponseFromFile('suppliers.json');
        $items = $this->api->suppliers()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplier()
    {
        $this->adapter->queueResponseFromFile('supplier.json');
        $item = $this->api->suppliers()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testSupplierSubContacts()
    {
        $this->adapter->queueResponseFromFile('suppliercontacts.json');
        $items = $this->api->suppliers()->contacts(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierSubGroups()
    {
        $this->adapter->queueResponseFromFile('suppliersubgroups.json');
        $items = $this->api->suppliers()->groups(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierSubBuildingSettings()
    {
        $this->adapter->queueResponseFromFile('supplierbuildingsettings.json');
        $items = $this->api->suppliers()->buildingSettings(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testSupplierSubTechnicalSheets()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->suppliers()->technicalSheets(1)->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testTechnicalSheets()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->technicalSheets()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testTechnicalSheet()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->technicalSheets()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testUsers()
    {
        $this->adapter->queueResponseFromFile('items.json');
        $items = $this->api->users()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(1, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testUser()
    {
        $this->adapter->queueResponseFromFile('item.json');
        $item = $this->api->users()->get(1);

        $this->assertSame(1, $item->id);
    }

    public function testVatRates()
    {
        $this->adapter->queueResponseFromFile('vatrates.json');
        $items = $this->api->vatRates()->get();
        $item = $items->get(0);

        $this->assertSame(1, $items->getPageCount());
        $this->assertSame(3, $items->count());

        $this->assertSame(1, $item->id);
    }

    public function testVatRate()
    {
        $this->adapter->queueResponseFromFile('vatrate.json');
        $item = $this->api->vatRates()->get(1);

        $this->assertSame(1, $item->id);
    }
}
