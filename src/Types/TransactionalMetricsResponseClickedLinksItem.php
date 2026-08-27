<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalMetricsResponseClickedLinksItem extends JsonSerializableType
{
    /**
     * @var ?int $clicks
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?float $percentage
     */
    #[JsonProperty('percentage')]
    public ?float $percentage;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   clicks?: ?int,
     *   percentage?: ?float,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
