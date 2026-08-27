<?php

namespace Sequenzy\SyncRules\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SyncRule;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateSyncRulesRequest extends JsonSerializableType
{
    /**
     * @var ?array<SyncRule> $syncRules Full replacement rule set. An empty array disables rules; null opts into the inherited SaaS/ecommerce platform preset.
     */
    #[JsonProperty('syncRules'), ArrayType([SyncRule::class])]
    public ?array $syncRules;

    /**
     * @param array{
     *   syncRules?: ?array<SyncRule>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->syncRules = $values['syncRules'] ?? null;
    }
}
