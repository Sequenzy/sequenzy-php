<?php

namespace Sequenzy\WarehouseSync\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\WarehouseSync\Types\CreateWarehouseConnectionRequestProvider;

class CreateWarehouseConnectionRequest extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $config Non-secret settings. snowflake: account, username, warehouse, database, schema, role. bigquery: projectId, location. redshift and postgres: host, port (default 5439 or 5432), database, username, sslMode (require or verify-full, default require).
     */
    #[JsonProperty('config'), ArrayType(['string' => 'mixed'])]
    public array $config;

    /**
     * @var array<string, mixed> $credentials Secrets, stored encrypted and never returned. snowflake: privateKey (PKCS#8 PEM) and optional privateKeyPassphrase. bigquery: serviceAccountJson (the key file contents). redshift and postgres: password.
     */
    #[JsonProperty('credentials'), ArrayType(['string' => 'mixed'])]
    public array $credentials;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<CreateWarehouseConnectionRequestProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @param array{
     *   config: array<string, mixed>,
     *   credentials: array<string, mixed>,
     *   name: string,
     *   provider: value-of<CreateWarehouseConnectionRequestProvider>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->config = $values['config'];
        $this->credentials = $values['credentials'];
        $this->name = $values['name'];
        $this->provider = $values['provider'];
    }
}
