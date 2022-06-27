<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Response;

use Organimmo\Rental\Request\PlaceholderRequest;
use Organimmo\Rental\ApiAdapter\ApiAdapter;

class ResponsePlaceholder extends Response
{
    protected $apiAdapter;

    public function __construct($data, ApiAdapter $api_adapter)
    {
        parent::__construct($data, $api_adapter);
        $this->apiAdapter = $api_adapter;
    }

    public function get(): Response
    {
        $request = new PlaceholderRequest($this->apiAdapter, $this->_data['href']);
        $response = $this->apiAdapter->request($request);
        return $response ? new Response($response, $this->apiAdapter) : null;
    }

    public function download(string $path, int $flags = 0)
    {
        $request = new PlaceholderRequest($this->apiAdapter, $this->_data['href']);
        $response = $this->apiAdapter->request($request, true);
        return file_put_contents($path, $response, $flags);
    }
}
