<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class SimpleCollectionRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    protected $endpoint;

    public function __construct(string $endpoint, ApiAdapter $adapter)
    {
        $this->endpoint = $endpoint;
        parent::__construct($adapter);
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
