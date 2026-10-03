<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PushCampaignStats extends JsonSerializableType
{
    /**
     * @var ?int $clicked Contacts who opened the notification.
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @var ?int $delivered Contacts whose device reported displaying the notification (browsers and apps that report displays).
     */
    #[JsonProperty('delivered')]
    public ?int $delivered;

    /**
     * @var ?int $devicesAccepted
     */
    #[JsonProperty('devicesAccepted')]
    public ?int $devicesAccepted;

    /**
     * @var ?int $devicesTargeted
     */
    #[JsonProperty('devicesTargeted')]
    public ?int $devicesTargeted;

    /**
     * @var ?int $failed
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?array<PushCampaignStatsFailureReasonsItem> $failureReasons
     */
    #[JsonProperty('failureReasons'), ArrayType([PushCampaignStatsFailureReasonsItem::class])]
    public ?array $failureReasons;

    /**
     * @var ?int $pending
     */
    #[JsonProperty('pending')]
    public ?int $pending;

    /**
     * @var ?int $sent Contacts whose push at least one push service accepted.
     */
    #[JsonProperty('sent')]
    public ?int $sent;

    /**
     * @var ?int $skipped
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @var ?array<PushCampaignStatsSkipReasonsItem> $skipReasons
     */
    #[JsonProperty('skipReasons'), ArrayType([PushCampaignStatsSkipReasonsItem::class])]
    public ?array $skipReasons;

    /**
     * @var ?int $total Contacts in the send.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   clicked?: ?int,
     *   delivered?: ?int,
     *   devicesAccepted?: ?int,
     *   devicesTargeted?: ?int,
     *   failed?: ?int,
     *   failureReasons?: ?array<PushCampaignStatsFailureReasonsItem>,
     *   pending?: ?int,
     *   sent?: ?int,
     *   skipped?: ?int,
     *   skipReasons?: ?array<PushCampaignStatsSkipReasonsItem>,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicked = $values['clicked'] ?? null;
        $this->delivered = $values['delivered'] ?? null;
        $this->devicesAccepted = $values['devicesAccepted'] ?? null;
        $this->devicesTargeted = $values['devicesTargeted'] ?? null;
        $this->failed = $values['failed'] ?? null;
        $this->failureReasons = $values['failureReasons'] ?? null;
        $this->pending = $values['pending'] ?? null;
        $this->sent = $values['sent'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->skipReasons = $values['skipReasons'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
