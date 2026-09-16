<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Present on campaign detail and settings responses. Null if the campaign is missing. Counts unique recipient deliveries across retry attempts, excluding separate test emails.
 */
class AbTestProgress extends JsonSerializableType
{
    /**
     * @var ?int $audienceSize Original send-time audience size; null for legacy campaigns without an estimate.
     */
    #[JsonProperty('audienceSize')]
    public ?int $audienceSize;

    /**
     * @var ?string $campaignStatus
     */
    #[JsonProperty('campaignStatus')]
    public ?string $campaignStatus;

    /**
     * @var ?int $committed Recipients with a durable send attempt, including pending or failed sends.
     */
    #[JsonProperty('committed')]
    public ?int $committed;

    /**
     * @var ?int $minimumTestPercentage Minimum whole percentage that contains committed recipients, at least 5; null without audience size. Workers revalidate against later sends.
     */
    #[JsonProperty('minimumTestPercentage')]
    public ?int $minimumTestPercentage;

    /**
     * @var ?string $pauseReason
     */
    #[JsonProperty('pauseReason')]
    public ?string $pauseReason;

    /**
     * @var ?int $remaining Audience size minus committed recipients, floored at zero; null when size is unavailable.
     */
    #[JsonProperty('remaining')]
    public ?int $remaining;

    /**
     * @var ?int $sent Recipients with a sentAt timestamp on an attempt.
     */
    #[JsonProperty('sent')]
    public ?int $sent;

    /**
     * @var ?array<AbTestProgressVariantsItem> $variants
     */
    #[JsonProperty('variants'), ArrayType([AbTestProgressVariantsItem::class])]
    public ?array $variants;

    /**
     * @param array{
     *   audienceSize?: ?int,
     *   campaignStatus?: ?string,
     *   committed?: ?int,
     *   minimumTestPercentage?: ?int,
     *   pauseReason?: ?string,
     *   remaining?: ?int,
     *   sent?: ?int,
     *   variants?: ?array<AbTestProgressVariantsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->audienceSize = $values['audienceSize'] ?? null;
        $this->campaignStatus = $values['campaignStatus'] ?? null;
        $this->committed = $values['committed'] ?? null;
        $this->minimumTestPercentage = $values['minimumTestPercentage'] ?? null;
        $this->pauseReason = $values['pauseReason'] ?? null;
        $this->remaining = $values['remaining'] ?? null;
        $this->sent = $values['sent'] ?? null;
        $this->variants = $values['variants'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
