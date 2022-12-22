<?php

namespace vasyaxy\Services\Trello\Traits;

use League\OAuth1\Client\Credentials\TemporaryCredentials;

trait AuthorizationTrait
{
    /**
     * Retrieves currently configured authorization broker.
     *
     * @return vasyaxy\Services\Trello\Authorization
     * @codeCoverageIgnore
     */
    abstract public function getAuthorization();

    /**
     * Retrieves currently configured http broker.
     *
     * @return vasyaxy\Services\Trello\Http
     * @codeCoverageIgnore
     */
    abstract public function getHttp();

    /**
     * Retrieves http response from Trello api for authorization.
     *
     * @param  array $attributes
     *
     * @return object
     */
    public function getAuthorize($attributes = [])
    {
        return $this->getHttp()->get('authorize', $attributes);
    }

    /**
     * Retrieves complete authorization url.
     *
     * @param  League\OAuth1\Client\Credentials\TemporaryCredentials   $temporaryCredentials
     *
     * @return string
     */
    public function getAuthorizationUrl(TemporaryCredentials $temporaryCredentials = null, object $session = null)
    {
        return $this->getAuthorization()->getAuthorizationUrl($temporaryCredentials, $session);
    }

    /**
     * Retrives access token credentials with token and verifier.
     *
     * @param  string                                                  $token
     * @param  string                                                  $verifier
     * @param  League\OAuth1\Client\Credentials\TemporaryCredentials   $temporaryCredentials
     * @param  object|null                                             $session
     *
     * @return League\OAuth1\Client\Credentials\CredentialsInterface
     */
    public function getAccessToken($token, $verifier, TemporaryCredentials $temporaryCredentials = null, object $session = null)
    {
        return $this->getAuthorization()->getToken($token, $verifier, $temporaryCredentials, $session);
    }

    /**
     * Creates and returns new temporary credentials instance.
     *
     * @return League\OAuth1\Client\Credentials\CredentialsInterface
     */
    public function getTemporaryCredentials()
    {
        return $this->getAuthorization()->getTemporaryCredentials();
    }
}
