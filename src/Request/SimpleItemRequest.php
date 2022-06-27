<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class SimpleItemRequest extends ItemRequest
{
    protected $endpoint;

    public function __construct(string $endpoint, int $id, ApiAdapter $adapter)
    {
        $this->endpoint = $endpoint;
        parent::__construct($id, $adapter);
    }

    public function getEndpoint(): string
    {
        return $this->endpoint . '/' . $this->id;
    }
}
