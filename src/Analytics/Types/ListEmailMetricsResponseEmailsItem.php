<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListEmailMetricsResponseEmailsItem extends JsonSerializableType
{
    /**
     * @var ?string $automationNodeId
     */
    #[JsonProperty('automationNodeId')]
    public ?string $automationNodeId;

    /**
     * @var ?string $campaignId
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?int $conversions
     */
    #[JsonProperty('conversions')]
    public ?int $conversions;

    /**
     * @var ?string $emailId Campaign ID for campaigns, automation node ID for sequence emails.
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?value-of<ListEmailMetricsResponseEmailsItemEmailType> $emailType
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $revenueCents
     */
    #[JsonProperty('revenueCents')]
    public ?int $revenueCents;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?string $sequenceName
     */
    #[JsonProperty('sequenceName')]
    public ?string $sequenceName;

    /**
     * @var ?array<string, mixed> $stats Delivery funnel for this email alone.
     */
    #[JsonProperty('stats'), ArrayType(['string' => 'mixed'])]
    public ?array $stats;

    /**
     * @var ?int $step 1-based position of this email in its sequence, or null for campaigns.
     */
    #[JsonProperty('step')]
    public ?int $step;

    /**
     * @param array{
     *   automationNodeId?: ?string,
     *   campaignId?: ?string,
     *   conversions?: ?int,
     *   emailId?: ?string,
     *   emailType?: ?value-of<ListEmailMetricsResponseEmailsItemEmailType>,
     *   name?: ?string,
     *   revenueCents?: ?int,
     *   sequenceId?: ?string,
     *   sequenceName?: ?string,
     *   stats?: ?array<string, mixed>,
     *   step?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automationNodeId = $values['automationNodeId'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->conversions = $values['conversions'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->revenueCents = $values['revenueCents'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->sequenceName = $values['sequenceName'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->step = $values['step'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
