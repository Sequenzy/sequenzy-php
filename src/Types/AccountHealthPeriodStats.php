<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Email stats for one period. Rates are percentages (0-100).
 */
class AccountHealthPeriodStats extends JsonSerializableType
{
    /**
     * @var ?float $bounceRate
     */
    #[JsonProperty('bounceRate')]
    public ?float $bounceRate;

    /**
     * @var ?int $bounces
     */
    #[JsonProperty('bounces')]
    public ?int $bounces;

    /**
     * @var ?int $campaignsSent
     */
    #[JsonProperty('campaignsSent')]
    public ?int $campaignsSent;

    /**
     * @var ?float $clickRate
     */
    #[JsonProperty('clickRate')]
    public ?float $clickRate;

    /**
     * @var ?int $clicks
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?float $complaintRate
     */
    #[JsonProperty('complaintRate')]
    public ?float $complaintRate;

    /**
     * @var ?int $complaints
     */
    #[JsonProperty('complaints')]
    public ?int $complaints;

    /**
     * @var ?int $deliveries
     */
    #[JsonProperty('deliveries')]
    public ?int $deliveries;

    /**
     * @var ?float $openRate
     */
    #[JsonProperty('openRate')]
    public ?float $openRate;

    /**
     * @var ?int $opens
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @var ?int $sends
     */
    #[JsonProperty('sends')]
    public ?int $sends;

    /**
     * @var ?int $unsubscribes
     */
    #[JsonProperty('unsubscribes')]
    public ?int $unsubscribes;

    /**
     * @param array{
     *   bounceRate?: ?float,
     *   bounces?: ?int,
     *   campaignsSent?: ?int,
     *   clickRate?: ?float,
     *   clicks?: ?int,
     *   complaintRate?: ?float,
     *   complaints?: ?int,
     *   deliveries?: ?int,
     *   openRate?: ?float,
     *   opens?: ?int,
     *   sends?: ?int,
     *   unsubscribes?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounceRate = $values['bounceRate'] ?? null;
        $this->bounces = $values['bounces'] ?? null;
        $this->campaignsSent = $values['campaignsSent'] ?? null;
        $this->clickRate = $values['clickRate'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->complaintRate = $values['complaintRate'] ?? null;
        $this->complaints = $values['complaints'] ?? null;
        $this->deliveries = $values['deliveries'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->sends = $values['sends'] ?? null;
        $this->unsubscribes = $values['unsubscribes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
