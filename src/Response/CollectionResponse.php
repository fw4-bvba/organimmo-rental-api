<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Response;

use Organimmo\Rental\Request\Request;
use Organimmo\Rental\Request\CollectionRequest;
use Organimmo\Rental\ApiAdapter\ApiAdapterInterface;

class CollectionResponse implements \Countable, \IteratorAggregate, \ArrayAccess
{
    protected $buffer;
    protected $bufferPosition;

    public function __construct(CollectionRequest $request, ApiAdapterInterface $api_adapter)
    {
        $this->buffer = new CollectionResponseBuffer($request, $api_adapter);
    }

    public function get(int $position): ResponseObject
    {
        return $this->buffer->get($position);
    }
	
	public function getPageSize(): int
	{
		return $this->buffer->getPageSize();
	}
	
	public function getPageCount(): int
	{
		return intval(ceil($this->count() / $this->getPageSize()));
	}
    
    public function __debugInfo(): array
    {
        return [
            'count' => $this->count(),
			'pageSize' => $this->getPageSize(),
			'pageCount' => $this->getPageCount(),
        ];
    }

    /* Countable implementation */

    public function count(): int
    {
        return $this->buffer->getRowCount();
    }

    /* IteratorAggregate implementation */

    public function getIterator(): CollectionResponseIterator
    {
        return new CollectionResponseIterator($this);
    }
    
    /* ArrayAccess implementation */
    
    public function offsetExists($offset): bool
    {
        if (!is_int($offset)) return false;
        return $offset < $this->count();
    }
    
    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) return null;
        return $this->get($offset);
    }
    
	/**
	 * @codeCoverageIgnore
	 */
    public function offsetSet($offset, $value): void
    {
        throw new \Exception('offsetSet not implemented on CollectionResponse');
    }
    
	/**
	 * @codeCoverageIgnore
	 */
    public function offsetUnset($offset): void
    {
        throw new \Exception('offsetUnset not implemented on CollectionResponse');
    }
}
