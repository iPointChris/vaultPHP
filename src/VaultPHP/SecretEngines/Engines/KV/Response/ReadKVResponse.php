<?php

namespace VaultPHP\SecretEngines\Engines\KV\Response;

use VaultPHP\Response\EndpointResponse;

/**
 * Class ReadKVResponse
 * @package VaultPHP\SecretEngines\KV\Response
 */
final class ReadKVResponse extends EndpointResponse
{
    /** @var string[] */
    protected $data = [];

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->data;
    }
}
