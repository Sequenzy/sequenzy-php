<?php

namespace Sequenzy\Migrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class StartMigrationsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $resourceIds
     */
    #[JsonProperty('resourceIds'), ArrayType(['string'])]
    public ?array $resourceIds;

    /**
     * @var ?array<string, array<string, mixed>> $resourceOptions
     */
    #[JsonProperty('resourceOptions'), ArrayType(['string' => ['string' => 'mixed']])]
    public ?array $resourceOptions;

    /**
     * @param array{
     *   resourceIds?: ?array<string>,
     *   resourceOptions?: ?array<string, array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->resourceIds = $values['resourceIds'] ?? null;
        $this->resourceOptions = $values['resourceOptions'] ?? null;
    }
}
