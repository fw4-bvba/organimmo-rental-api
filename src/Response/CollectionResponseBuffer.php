<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Response;

use Organimmo\Rental\Exception\ApiException;
use Organimmo\Rental\Request\CollectionRequest;
use Organimmo\Rental\ApiAdapter\ApiAdapterInterface;

final class CollectionResponseBuffer
{
    protected $request;
    protected $apiAdapter;
    protected $buffer;
    protected $rowCount;
    protected $pageSize;
    protected $page;

    public function __construct(CollectionRequest $request, ApiAdapterInterface $api_adapter)
    {
        $this->request = $request;
        $this->apiAdapter = $api_adapter;
        $this->pageSize = $request->getPageSize();

        $this->bufferPage(0);
    }

    public function getRowCount(): int
    {
        return $this->rowCount ?? 0;
    }

	public function getPageSize(): int
	{
		return $this->pageSize;
	}

    public function get(int $position): ResponseObject
    {
        if (!$this->isBuffered($position)) {
            $this->bufferPage(floor($position / $this->pageSize));
        }
        return $this->buffer[$position % $this->pageSize];
    }

    protected function bufferPage(int $page)
    {
        if ($this->page === $page) return;
        $this->page = $page;

        $this->request->setPage($page, $this->pageSize);
        $response = $this->apiAdapter->request($this->request);

        $this->buffer = [];
        $this->current = 0;
        $this->rowCount = $this->apiAdapter->getRowCount();
        if (!is_null($response)) {
            foreach ($response as $row) {
                $this->buffer[] = new ResponseObject($row, $this->apiAdapter);
            }
        }
    }

    protected function isBuffered(int $position): bool
    {
        $first_position = $this->pageSize * $this->page;
        return ($position >= $first_position && $position < $first_position + count($this->buffer));
    }
}
