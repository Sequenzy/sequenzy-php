<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TransactionalMetricsResponseBounceBreakdown extends JsonSerializableType
{
    /**
     * @var ?int $blocked Temporary bounces the receiving server refused over content, policy, reputation or sender authentication (subtypes ContentRejected, AttachmentRejected, ReputationBlocked, NonRecipientFailure and AppleRelayUnregistered). A subset of transient; soft bounces are transient minus blocked. Blocked bounces never suppress the address.
     */
    #[JsonProperty('blocked')]
    public ?int $blocked;

    /**
     * @var ?int $permanent
     */
    #[JsonProperty('permanent')]
    public ?int $permanent;

    /**
     * @var ?array<TransactionalMetricsResponseBounceBreakdownSubtypesItem> $subtypes
     */
    #[JsonProperty('subtypes'), ArrayType([TransactionalMetricsResponseBounceBreakdownSubtypesItem::class])]
    public ?array $subtypes;

    /**
     * @var ?int $transient Every temporary bounce, including blocked ones.
     */
    #[JsonProperty('transient')]
    public ?int $transient;

    /**
     * @var ?int $undetermined
     */
    #[JsonProperty('undetermined')]
    public ?int $undetermined;

    /**
     * @param array{
     *   blocked?: ?int,
     *   permanent?: ?int,
     *   subtypes?: ?array<TransactionalMetricsResponseBounceBreakdownSubtypesItem>,
     *   transient?: ?int,
     *   undetermined?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocked = $values['blocked'] ?? null;
        $this->permanent = $values['permanent'] ?? null;
        $this->subtypes = $values['subtypes'] ?? null;
        $this->transient = $values['transient'] ?? null;
        $this->undetermined = $values['undetermined'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
