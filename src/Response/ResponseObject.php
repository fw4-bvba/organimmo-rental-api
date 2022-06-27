<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Response;

use Organimmo\Rental\Exception\InvalidPropertyException;
use Organimmo\Rental\Exception\InvalidDataException;
use Organimmo\Rental\ApiAdapter\ApiAdapter;

class ResponseObject implements \JsonSerializable
{
    protected $_data = [];

    public function __construct($data, ApiAdapter $api_adapter)
    {
        if (!is_iterable($data) && !is_object($data)) {
            throw new InvalidDataException('ResponseObject does not accept data of type "' . gettype($data) . '"');
        }
        foreach ($data as $property => &$value) {
            $this->$property = $this->parseValue($value, $property, $api_adapter);
        }
    }

    protected function parseValue($value, ?string $property = null, ?ApiAdapter $api_adapter = null)
    {
        if (is_object($value)) {
            if (isset($value->objectID) && isset($value->href)) {
                if (!isset($value->value)) {
                    return new ResponsePlaceholder($value, $api_adapter);
                } else {
                    return new self($value->value, $api_adapter);
                }
            } else {
                return new self($value, $api_adapter);
            }
        } else if (is_array($value)) {
            $result = [];
            foreach ($value as &$subvalue) {
                $result[] = $this->parseValue($subvalue, $property, $api_adapter);
            }
            return $result;
        } else if (is_string($value) && preg_match('/^(?:[1-9]\d{3}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1\d|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[1-9]\d(?:0[48]|[2468][048]|[13579][26])|(?:[2468][048]|[13579][26])00)-02-29)T(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d(?:\.\d{1,9})?(?:Z|[+-][01]\d:[0-5]\d)?$/', $value)) {
            return new \DateTime($value);
        } else {
            return $value;
        }
    }

    public function getData(): array
    {
        return $this->_data;
    }

    public function __get(string $property)
    {
        $this->validatePropertyName($property);
        return $this->_data[$property] ?? null;
    }

    public function __set(string $property, $value)
    {
        $this->_data[$property] = $value;
    }

    public function __isset(string $property): bool
    {
        return isset($this->_data[$property]);
    }

    public function __unset(string $property)
    {
        $this->validatePropertyName($property);
        unset($this->_data[$property]);
    }

    public function __debugInfo()
    {
        return $this->getData();
    }

    protected function validatePropertyName(string $property): string
    {
        if (!array_key_exists($property, $this->_data)) {
            throw new InvalidPropertyException($property . ' is not a valid property of ' . static::class);
        }
        return $property;
    }

    /* JsonSerializable implementation */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->getData();
    }
}
