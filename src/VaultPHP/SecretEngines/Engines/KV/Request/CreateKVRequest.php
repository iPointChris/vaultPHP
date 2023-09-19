<?php

namespace VaultPHP\SecretEngines\Engines\KV\Request;

use VaultPHP\SecretEngines\Interfaces\ResourceRequestInterface;
use VaultPHP\SecretEngines\Traits\ArrayExportTrait;

/**
 * Class CreateKVRequest
 * @package VaultPHP\SecretEngines\KV\Request
 */
final class CreateKVRequest implements ResourceRequestInterface
{
    use ArrayExportTrait;


    /**
     * CreateKeyRequest constructor.
     * @param string $name
     */
    public function __construct()
    {
        
    }

}
