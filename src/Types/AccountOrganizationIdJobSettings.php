<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * What the run reads. A run already in progress for the same `propertyKey` keeps its own `source` and `nameKey`, which may differ from a later request.
 */
class AccountOrganizationIdJobSettings extends JsonSerializableType
{
    /**
     * @var ?string $nameKey
     */
    #[JsonProperty('nameKey')]
    public ?string $nameKey;

    /**
     * @var ?string $propertyKey
     */
    #[JsonProperty('propertyKey')]
    public ?string $propertyKey;

    /**
     * @var ?value-of<AccountOrganizationIdJobSettingsSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @param array{
     *   nameKey?: ?string,
     *   propertyKey?: ?string,
     *   source?: ?value-of<AccountOrganizationIdJobSettingsSource>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->nameKey = $values['nameKey'] ?? null;
        $this->propertyKey = $values['propertyKey'] ?? null;
        $this->source = $values['source'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
