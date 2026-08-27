<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use DateTime;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * One emitted event crossed with the company's sync rules and sequences.
 */
class IntegrationEventWiring extends JsonSerializableType
{
    /**
     * @var ?DateTime $accountLastSeenAt When the account last received the event name from any source.
     */
    #[JsonProperty('accountLastSeenAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $accountLastSeenAt;

    /**
     * @var ?array<string> $addsTags
     */
    #[JsonProperty('addsTags'), ArrayType(['string'])]
    public ?array $addsTags;

    /**
     * @var ?string $event
     */
    #[JsonProperty('event')]
    public ?string $event;

    /**
     * @var ?array<IntegrationEventWiringListenersItem> $listeners Sequences that trigger on this event.
     */
    #[JsonProperty('listeners'), ArrayType([IntegrationEventWiringListenersItem::class])]
    public ?array $listeners;

    /**
     * @var ?bool $observedByAccount Whether the account has received this event name from any source. Not integration-specific.
     */
    #[JsonProperty('observedByAccount')]
    public ?bool $observedByAccount;

    /**
     * @var ?array<string> $removesTags
     */
    #[JsonProperty('removesTags'), ArrayType(['string'])]
    public ?array $removesTags;

    /**
     * @var ?array<IntegrationEventWiringRulesItem> $rules Every matching sync rule, kept separate so conditional effects remain accurate.
     */
    #[JsonProperty('rules'), ArrayType([IntegrationEventWiringRulesItem::class])]
    public ?array $rules;

    /**
     * @var ?value-of<IntegrationEventWiringRuleSource> $ruleSource Where the matching sync rule came from. "none" means no rule touches this event, so it changes no tags.
     */
    #[JsonProperty('ruleSource')]
    public ?string $ruleSource;

    /**
     * @var ?string $when
     */
    #[JsonProperty('when')]
    public ?string $when;

    /**
     * @param array{
     *   accountLastSeenAt?: ?DateTime,
     *   addsTags?: ?array<string>,
     *   event?: ?string,
     *   listeners?: ?array<IntegrationEventWiringListenersItem>,
     *   observedByAccount?: ?bool,
     *   removesTags?: ?array<string>,
     *   rules?: ?array<IntegrationEventWiringRulesItem>,
     *   ruleSource?: ?value-of<IntegrationEventWiringRuleSource>,
     *   when?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountLastSeenAt = $values['accountLastSeenAt'] ?? null;
        $this->addsTags = $values['addsTags'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->listeners = $values['listeners'] ?? null;
        $this->observedByAccount = $values['observedByAccount'] ?? null;
        $this->removesTags = $values['removesTags'] ?? null;
        $this->rules = $values['rules'] ?? null;
        $this->ruleSource = $values['ruleSource'] ?? null;
        $this->when = $values['when'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
