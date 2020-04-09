<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

abstract class RequestObject implements \JsonSerializable
{
    protected $_data = [];

    public function __debugInfo(): array
    {
        return $this->getData();
    }

    public function getData(): array
    {
        return $this->_data;
    }

    /* JsonSerializable implementation */

    public function jsonSerialize()
    {
        return $this->getData();
    }
}
