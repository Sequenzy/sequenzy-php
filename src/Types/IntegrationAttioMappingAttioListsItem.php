<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IntegrationAttioMappingAttioListsItem extends JsonSerializableType
{
    /**
     * @var ?string $apiSlug
     */
    #[JsonProperty('apiSlug')]
    public ?string $apiSlug;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   apiSlug?: ?string,
     *   id?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiSlug = $values['apiSlug'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
