<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalMetricsResponseEngagementBreakdownHuman extends JsonSerializableType
{
    /**
     * @var ?int $clicks
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?int $opens
     */
    #[JsonProperty('opens')]
    public ?int $opens;

    /**
     * @param array{
     *   clicks?: ?int,
     *   opens?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
        $this->opens = $values['opens'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
