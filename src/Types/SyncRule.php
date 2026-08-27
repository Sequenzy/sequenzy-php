<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SyncRule extends JsonSerializableType
{
    /**
     * @var SyncRuleActions $actions
     */
    #[JsonProperty('actions')]
    public SyncRuleActions $actions;

    /**
     * @var ?SyncRuleConditions $conditions Optional conditions that must all hold for the rule to apply.
     */
    #[JsonProperty('conditions')]
    public ?SyncRuleConditions $conditions;

    /**
     * @var string $triggerEvent Event name that triggers the rule.
     */
    #[JsonProperty('triggerEvent')]
    public string $triggerEvent;

    /**
     * @param array{
     *   actions: SyncRuleActions,
     *   triggerEvent: string,
     *   conditions?: ?SyncRuleConditions,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->actions = $values['actions'];
        $this->conditions = $values['conditions'] ?? null;
        $this->triggerEvent = $values['triggerEvent'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
