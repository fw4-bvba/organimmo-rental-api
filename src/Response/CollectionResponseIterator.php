<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Response;

class CollectionResponseIterator implements \Iterator
{
    protected $response;
    protected $position = 0;

    public function __construct(CollectionResponse $response)
    {
        $this->response = $response;
    }

    /* Iterator implementation */

    public function current(): ?ResponseObject
    {
        return $this->response->get($this->position);
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return $this->position >= 0 && $this->position < $this->response->count();
    }
}
