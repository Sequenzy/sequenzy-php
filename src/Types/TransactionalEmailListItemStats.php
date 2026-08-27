<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalEmailListItemStats extends JsonSerializableType
{
    /**
     * @var ?int $bounces
     */
    #[JsonProperty('bounces')]
    public ?int $bounces;

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
     * @param array{
     *   bounces?: ?int,
     *   clickRate?: ?float,
     *   clicks?: ?int,
     *   deliveries?: ?int,
     *   openRate?: ?float,
     *   opens?: ?int,
     *   sends?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounces = $values['bounces'] ?? null;
        $this->clickRate = $values['clickRate'] ?? null;
        $this->clicks = $values['clicks'] ?? null;
        $this->deliveries = $values['deliveries'] ?? null;
        $this->openRate = $values['openRate'] ?? null;
        $this->opens = $values['opens'] ?? null;
        $this->sends = $values['sends'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
