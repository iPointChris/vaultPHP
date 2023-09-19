<?php

namespace VaultPHP\SecretEngines\Engines\KV;

use VaultPHP\Exceptions\InvalidDataException;
use VaultPHP\Exceptions\InvalidRouteException;
use VaultPHP\Exceptions\VaultAuthenticationException;
use VaultPHP\Exceptions\VaultException;
use VaultPHP\Exceptions\VaultHttpException;
use VaultPHP\Response\BulkEndpointResponse;
use VaultPHP\Response\EndpointResponse;
use VaultPHP\SecretEngines\AbstractSecretEngine;

use VaultPHP\SecretEngines\Engines\KV\Request\CreateKVRequest;
use VaultPHP\SecretEngines\Engines\KV\Response\CreateKVResponse;
use VaultPHP\SecretEngines\Engines\KV\Response\ListKVResponse;
use VaultPHP\SecretEngines\Engines\KV\Response\ReadKVResponse;

/**
 * Class KV
 * @package VaultPHP\SecretEngines\Engines\KV
 */
final class KV extends AbstractSecretEngine
{
    /**
     * @param CreateKVRequest $CreateKVRequest
     * @return CreateKVResponse
     * @throws InvalidDataException
     * @throws InvalidRouteException
     * @throws VaultException
     */
    public function createKV(CreateKVRequest $createKVRequest)
    {
        /** @var CreateKVResponse */
        return $this->vaultClient->sendApiRequest(
            'POST',
            sprintf('/v1/secret/%s', urlencode($createKVRequest->getName())),
            CreateKVResponse::class,
            $createKVRequest
        );
    }
    /**
     * @param  string $path, string $mount
     * @return ListKVResponse
     * @throws InvalidDataException
     * @throws InvalidRouteException
     * @throws VaultException
     */
    public function listKV( $mount , $path )
    {
        /** @var ListKVResponse */
        return $this->vaultClient->sendApiRequest(
            'LIST',
            sprintf('/v1/%s/metadata/%s', urlencode( $mount), urlencode($path)),
            ListKVResponse::class,
            []
        );
    }

    /**
     * @param string $path
     * @return EndpointResponse
     * @throws InvalidDataException
     * @throws InvalidRouteException
     * @throws VaultException
     */
    public function readKV($mount, $path)
    {
        /** @var EndpointResponse */
        return $this->vaultClient->sendApiRequest(
            'GET',
            sprintf('/v1/%s/data/%s?version=', urlencode($mount),urlencode($path)),
            ReadKVResponse::class,
            []
        );
    }

}
