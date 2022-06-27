<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\ApiAdapter\ApiAdapter;

class PlaceholderRequest extends Request
{
    protected $href;

    public function __construct(ApiAdapter $adapter, string $href)
    {
        parent::__construct($adapter);
        $this->href = preg_replace('/^(?:\/|v1)*/', '', $href);
    }

    public function getEndpoint(): string
    {
        return $this->href;
    }
}
