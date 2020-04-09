<?php
/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\ApiAdapter;

use League\OAuth2\Client\Token\AccessTokenInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;
use Organimmo\Rental\OAuthProvider;
use Organimmo\Rental\Exception\AuthException;

final class HttpApiAdapter extends ApiAdapter
{
    private const BASE_URL = 'https://api.verhuur.expert/v1/';
    private const AUTH_URL = 'https://organimmo.eu.auth0.com/oauth/token';
    private const AUTH_AUDIENCE = 'https://api.verhuur.expert';
    
    private $oAuthProvider;
    private $accessToken;
    
    public function __construct(string $customer_id)
    {
        $version = \PackageVersions\Versions::getVersion('fw4/organimmo-rental-api');

        $this->oAuthProvider = new OAuthProvider([
            'urlAccessToken' => self::AUTH_URL,
            'headers' => [
                'Content-Type'   => 'application/json',
                'User-Agent'     => 'fw4-organimmo-rental-api/' . $version,
                'fs-customer-id' => $customer_id
            ],
        ]);
    }
    
    public function setAccessToken(AccessTokenInterface $token): void
    {
        $this->accessToken = $token;
    }
    
    public function requestAccessToken(string $client_id, string $client_secret, string $username, string $password): AccessTokenInterface
    {
        if (empty($this->accessToken) || $this->accessToken->hasExpired()) {
            $this->accessToken = $this->oAuthProvider->getAccessToken('password', [
                'audience'      => self::AUTH_AUDIENCE,
                'username'      => $username,
                'password'      => $password,
                'client_id'     => $client_id,
                'client_secret' => $client_secret,
            ]);
        }
        return $this->accessToken;
    }
    
    private function getAccessToken(): AccessTokenInterface
    {
        if (empty($this->accessToken)) {
            throw new AuthException('Missing access token. Call setAccessToken to use an existing token, or call requestAccessToken with your client credentials to retrieve a new one.');
        }
        return $this->accessToken;
    }
    
    public function requestBody(string $endpoint, ?array $params = null, ?array $headers = null): ?string
    {
        $options = [];
        $url = self::BASE_URL . ltrim($endpoint, '/');
        if (isset($params)) $url .= '?' . http_build_query($params);
        if (isset($headers)) $options['headers'] = $headers;
        
        $request = $this->oAuthProvider->getAuthenticatedRequest('GET', $url, $this->getAccessToken(), $options);
        $response = $this->getHttpClient()->send($request);
        if ($response->getStatusCode() === 204) return null;

        $headers = $response->getHeaders();
        if (!empty($headers['Content-Range']) && preg_match('/^(\d+)\-(\d+)\/(\d+)$/', $headers['Content-Range'][0], $content_range)) {
            $this->setRowCount(intval($content_range[3]));
        }
        
        return $response->getBody()->getContents();
    }
    
    private function getHttpClient()
    {
        return $this->oAuthProvider->getHttpClient();
    }
}
