<?php

namespace VaultPHP\SecretEngines\Engines\KV\Response;

use VaultPHP\Response\EndpointResponse;

/**
 * Class ListKVResponse
 * @package VaultPHP\SecretEngines\KV\Response
 */
final class ListKVResponse extends EndpointResponse
{
    /** @var string[] */
    protected $keys = [];

    /**
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
    }
}
