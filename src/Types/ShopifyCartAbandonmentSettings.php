<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ShopifyCartAbandonmentSettings extends JsonSerializableType
{
    /**
     * @var ?float $cooldownHours Minimum hours between cart-abandoned events per subscriber (default 24, max 720).
     */
    #[JsonProperty('cooldownHours')]
    public ?float $cooldownHours;

    /**
     * @var ?float $delayHours Hours of cart inactivity before the cart counts as abandoned (default 1, max 168).
     */
    #[JsonProperty('delayHours')]
    public ?float $delayHours;

    /**
     * @var ?bool $enabled Whether cart-abandonment events fire for this store (default true).
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?float $expireAfterHours Hours after which an untouched tracked cart is dropped instead of being emailed about or merged into by a later add (default 72, max 720). A store can empty a cart without sending a removal - a session or reservation timing out, an inventory hold releasing, checkout finishing on another device - and past this window the snapshot is no longer treated as evidence the shopper still has those items. Set it below delayHours on stores whose carts expire faster than the abandonment delay: those carts are then intentionally never emailed about.
     */
    #[JsonProperty('expireAfterHours')]
    public ?float $expireAfterHours;

    /**
     * @param array{
     *   cooldownHours?: ?float,
     *   delayHours?: ?float,
     *   enabled?: ?bool,
     *   expireAfterHours?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cooldownHours = $values['cooldownHours'] ?? null;
        $this->delayHours = $values['delayHours'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->expireAfterHours = $values['expireAfterHours'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
