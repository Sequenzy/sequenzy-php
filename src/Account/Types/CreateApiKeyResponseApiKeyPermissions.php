<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Effective permission receipt for the newly created key. Only scopes set to null grant current and future full access.
 */
class CreateApiKeyResponseApiKeyPermissions extends JsonSerializableType
{
    /**
     * @var ?int $currentScopeCount
     */
    #[JsonProperty('currentScopeCount')]
    public ?int $currentScopeCount;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $fullAccess
     */
    #[JsonProperty('fullAccess')]
    public ?bool $fullAccess;

    /**
     * @var ?string $preset Effective preset derived from the stored scopes. An explicit all-current-scopes array is custom, not full_access.
     */
    #[JsonProperty('preset')]
    public ?string $preset;

    /**
     * @var ?int $selectedScopeCount
     */
    #[JsonProperty('selectedScopeCount')]
    public ?int $selectedScopeCount;

    /**
     * @param array{
     *   currentScopeCount?: ?int,
     *   description?: ?string,
     *   fullAccess?: ?bool,
     *   preset?: ?string,
     *   selectedScopeCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->currentScopeCount = $values['currentScopeCount'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->fullAccess = $values['fullAccess'] ?? null;
        $this->preset = $values['preset'] ?? null;
        $this->selectedScopeCount = $values['selectedScopeCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
