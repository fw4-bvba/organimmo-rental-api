<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

abstract class Request extends RequestObject
{
    protected $adapter;
    protected $_headers = [];
    
    public function __construct(ApiAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getEndpoint(): string
    {
        return static::ENDPOINT;
    }

    public function getHeaders(): array
    {
        return $this->_headers;
    }

    public function depth(int $depth): Request
    {
        $this->_data['depth'] = $depth;
        return $this;
    }
}
