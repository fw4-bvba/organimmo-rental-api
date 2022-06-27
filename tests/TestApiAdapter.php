<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Tests;

use League\OAuth2\Client\Token\AccessTokenInterface;
use Organimmo\Rental\ApiAdapter\ApiAdapter;

final class TestApiAdapter extends ApiAdapter
{
    protected $responseQueue = [];

    public function setAccessToken(AccessTokenInterface $token): void
    {
        throw new \Exception('TestApiAdapter does not support access tokens');
    }

    public function requestAccessToken(string $client_id, string $client_secret, string $username, string $password): AccessTokenInterface
    {
        throw new \Exception('TestApiAdapter does not support access tokens');
    }

    public function queueResponse(string $body)
    {
        $this->responseQueue[] = $body;
    }

    public function queueResponseFromFile(string $filename)
    {
        $response = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'responses' . DIRECTORY_SEPARATOR . $filename);
        $this->queueResponse($response);
    }

    public function requestBody(string $endpoint, ?array $params = null, ?array $headers = null): ?string
    {
        if (count($this->responseQueue) === 0) {
            return null;
        }
        $response = $this->responseQueue[0];
        if (isset($params['take']) && isset($params['skip'])) {
            $response = json_decode($response, true);
            $this->setRowCount($response ? count($response) : 0);
            if ($params['take'] + $params['skip'] >= $this->getRowCount()) {
                array_shift($this->responseQueue);
            }
            $response = json_encode(array_slice($response, $params['skip'], $params['take']));
        } else {
            array_shift($this->responseQueue);
        }
        return $response;
    }
}
