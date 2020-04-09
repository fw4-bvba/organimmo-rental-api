<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\ApiAdapter;

use League\OAuth2\Client\Token\AccessTokenInterface;

interface ApiAdapterInterface
{
    public function setAccessToken(AccessTokenInterface $token): void;
    public function requestAccessToken(string $client_id, string $client_secret, string $username, string $password): AccessTokenInterface;
    public function requestBody(string $endpoint, ?array $params = null, ?array $headers = null): ?string;
}
