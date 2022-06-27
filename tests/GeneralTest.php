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
use Organimmo\Rental\Exception\InvalidPropertyException;
use Organimmo\Rental\Exception\AuthException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class GeneralTest extends TestCase
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

    public function testInvalidDataException()
    {
        $this->expectException(InvalidDataException::class);

        $this->adapter->queueResponseFromFile('country.json');
        $this->api->countries()->get();
    }

    public function testPagination()
    {
        $this->adapter->queueResponseFromFile('countries.json');
        $items = $this->api->countries()->setPageSize(10)->get();
        $item = $items->get(0);

        $this->assertSame(4, $items->getPageCount());
        $this->assertSame(10, $items->getPageSize());
        $this->assertSame(31, $items->count());

        foreach ($items as $key => $item) {
            $this->assertTrue(isset($item->id));
        }
    }

    public function testDepth()
    {
        $this->adapter->queueResponseFromFile('city-depth.json');
        $item = $this->api->cities()->depth(1)->get(1);

        $this->assertSame(1, $item->country->id);
    }

    public function testFilter()
    {
        $this->adapter->queueResponseFromFile('countries.json');
        $items = $this->api->countries()->sort('name')->from(date_create('2020-01-01'))->to(date_create('2020-12-31'))->get();

        $this->assertSame(31, $items->count());
    }

    public function testJson()
    {
        $request = $this->api->cities()->depth(1);

        $this->assertSame('{"depth":1}', json_encode($request));
    }

    public function testInvalidPropertyException()
    {
        $this->expectException(InvalidPropertyException::class);

        $this->adapter->queueResponseFromFile('city.json');
        $item = $this->api->cities()->get(1);

        $invalid = $item->invalidPropertyName;
    }

    public function testJsonSerialize()
    {
        $this->adapter->queueResponseFromFile('city.json');

        $json = json_encode($this->api->cities()->get(1));
        $this->assertIsString($json);

        $item = json_decode($json, true);
        $this->assertSame(1, $item['id']);
    }

    public function testIsset()
    {
        $this->adapter->queueResponseFromFile('city.json');
        $item = $this->api->cities()->get(1);

        $this->assertTrue(isset($item->id));
        $this->assertFalse(isset($item->invalidPropertyName));

        unset($item->id);
        $this->assertFalse(isset($item->id));
    }

    public function testPlaceholder()
    {
        $this->adapter->queueResponseFromFile('city.json');
        $item = $this->api->cities()->get(1);

        $this->adapter->queueResponseFromFile('country.json');
        $subitem = $item->country->get();

        $this->assertSame(1, $subitem->id);
    }

    public function testDebugInfo()
    {
        $this->adapter->queueResponseFromFile('city.json');
        $item = $this->api->cities()->get(1)->__debugInfo();

        $this->assertSame(1, $item['id']);
    }

    public function testCollectionDebugInfo()
    {
        $this->adapter->queueResponseFromFile('cities.json');
        $items = $this->api->cities()->get()->__debugInfo();

        $this->assertSame(3, $items['count']);
    }

    public function testCollectionOffset()
    {
        $this->adapter->queueResponseFromFile('cities.json');
        $items = $this->api->cities()->get();

        $this->assertTrue(isset($items[2]));
        $this->assertFalse(isset($items[3]));

        $item = $items[0];
        $this->assertTrue(isset($item->id));
    }

    public function testHttpAdapterAuthException()
    {
        $this->expectException(AuthException::class);

        $api = new Organimmo('');
        $api->cities()->get(1);
    }

    public function testHttpAdapterIdentityProviderException()
    {
        $this->expectException(IdentityProviderException::class);

        $api = new Organimmo('');
        $api->requestAccessToken('client_id', 'client_secret', 'username', 'password');
    }
}
