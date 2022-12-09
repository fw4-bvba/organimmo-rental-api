<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\ApiAdapter;

use Organimmo\Rental\Request\Request;
use Organimmo\Rental\Response\Response;
use Organimmo\Rental\Response\CollectionResponse;

abstract class ApiAdapter implements ApiAdapterInterface
{
    private $rowCount;

    public function request(?Request $request = null, bool $raw = false)
    {
        $this->rowCount = null;
        $http_body = $this->requestBody($request->getEndpoint(), $request->getData(), $request->getHeaders());
        if ($raw) {
            return $http_body;
        } else if (is_null($http_body)) {
            return null;
        } else {
            return json_decode($http_body, false);
        }
    }

    protected function setRowCount(?int $count)
    {
        $this->rowCount = $count;
    }

    public function getRowCount(): ?int
    {
        return $this->rowCount;
    }
}
