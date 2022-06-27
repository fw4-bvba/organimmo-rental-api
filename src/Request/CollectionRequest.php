<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\Response\CollectionResponse;
use Organimmo\Rental\Response\Response;
use DateTime;

abstract class CollectionRequest extends Request
{
    const DEFAULT_PAGE_SIZE = 500;

    protected $pageSize = CollectionRequest::DEFAULT_PAGE_SIZE;

    public function setPage(int $page, ?int $rows_per_page = null): void
    {
        if (is_null($rows_per_page)) {
            $rows_per_page = $this->getPageSize();
        }
        $this->_data['skip'] = $rows_per_page * $page;
        $this->_data['take'] = $rows_per_page;
    }

    public function sort(string $sort): CollectionRequest
    {
        $this->_data['sort'] = $sort;
        return $this;
    }

    public function from(DateTime $date_from): CollectionRequest
    {
        $this->_headers['org-data-from'] = $date_from->format('Y-m-d H:i');
        return $this;
    }

    public function to(DateTime $date_to): CollectionRequest
    {
        $this->_headers['org-data-to'] = $date_to->format('Y-m-d H:i');
        return $this;
    }

    public function getChildResponse(Request $child_request): ?Response
    {
        if (isset($this->_data['depth'])) {
            $child_request->depth($this->_data['depth']);
        }
        $response = $this->adapter->request($child_request);
        return $response ? new Response($response, $this->adapter) : null;
    }

    public function getSimpleChildResponse(int $id): ?Response
    {
        return $this->getChildResponse(new SimpleItemRequest($this->getEndpoint(), $id, $this->adapter));
    }

    public function get()
    {
        return new CollectionResponse($this, $this->adapter);
    }

    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    public function setPageSize(int $page_size): CollectionRequest
    {
        $this->pageSize = $page_size;
        return $this;
    }
}
