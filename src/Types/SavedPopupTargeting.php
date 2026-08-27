<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Where the popup may show. Empty arrays mean no restriction. Merged key by key.
 */
class SavedPopupTargeting extends JsonSerializableType
{
    /**
     * @var ?value-of<SavedPopupTargetingDevice> $device
     */
    #[JsonProperty('device')]
    public ?string $device;

    /**
     * @var ?array<string> $domains
     */
    #[JsonProperty('domains'), ArrayType(['string'])]
    public ?array $domains;

    /**
     * @var ?array<string> $excludedPaths
     */
    #[JsonProperty('excludedPaths'), ArrayType(['string'])]
    public ?array $excludedPaths;

    /**
     * @var ?array<string> $paths
     */
    #[JsonProperty('paths'), ArrayType(['string'])]
    public ?array $paths;

    /**
     * @param array{
     *   device?: ?value-of<SavedPopupTargetingDevice>,
     *   domains?: ?array<string>,
     *   excludedPaths?: ?array<string>,
     *   paths?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->device = $values['device'] ?? null;
        $this->domains = $values['domains'] ?? null;
        $this->excludedPaths = $values['excludedPaths'] ?? null;
        $this->paths = $values['paths'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
