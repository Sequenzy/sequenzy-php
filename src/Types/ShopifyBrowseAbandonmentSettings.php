<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ShopifyBrowseAbandonmentSettings extends JsonSerializableType
{
    /**
     * @var ?float $cooldownHours Minimum hours between browse-abandoned events per subscriber (default 24, max 720).
     */
    #[JsonProperty('cooldownHours')]
    public ?float $cooldownHours;

    /**
     * @var ?float $delayHours Hours to wait after a product view before the abandonment check (default 2, max 168).
     */
    #[JsonProperty('delayHours')]
    public ?float $delayHours;

    /**
     * @var ?bool $enabled Whether browse-abandonment events fire for this store (default true).
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @param array{
     *   cooldownHours?: ?float,
     *   delayHours?: ?float,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cooldownHours = $values['cooldownHours'] ?? null;
        $this->delayHours = $values['delayHours'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
