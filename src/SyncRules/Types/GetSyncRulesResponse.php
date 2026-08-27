<?php

namespace Sequenzy\SyncRules\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SyncRule;
use Sequenzy\Core\Types\ArrayType;

class GetSyncRulesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $isDefault True while the company still uses the platform default rules.
     */
    #[JsonProperty('isDefault')]
    public ?bool $isDefault;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<SyncRule> $syncRules
     */
    #[JsonProperty('syncRules'), ArrayType([SyncRule::class])]
    public ?array $syncRules;

    /**
     * @param array{
     *   isDefault?: ?bool,
     *   success?: ?bool,
     *   syncRules?: ?array<SyncRule>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->isDefault = $values['isDefault'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->syncRules = $values['syncRules'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
