<?php

namespace Sequenzy\Shopify\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ShopifyBrowseAbandonmentSettings;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\ShopifyCartAbandonmentSettings;
use Sequenzy\Types\ShopifyPriceDropSettings;

class UpdateAutomationSettingsShopifyRequest extends JsonSerializableType
{
    /**
     * @var ?ShopifyBrowseAbandonmentSettings $browseAbandonment
     */
    #[JsonProperty('browseAbandonment')]
    public ?ShopifyBrowseAbandonmentSettings $browseAbandonment;

    /**
     * @var ?ShopifyCartAbandonmentSettings $cartAbandonment
     */
    #[JsonProperty('cartAbandonment')]
    public ?ShopifyCartAbandonmentSettings $cartAbandonment;

    /**
     * @var ?ShopifyPriceDropSettings $priceDrop
     */
    #[JsonProperty('priceDrop')]
    public ?ShopifyPriceDropSettings $priceDrop;

    /**
     * @param array{
     *   browseAbandonment?: ?ShopifyBrowseAbandonmentSettings,
     *   cartAbandonment?: ?ShopifyCartAbandonmentSettings,
     *   priceDrop?: ?ShopifyPriceDropSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->browseAbandonment = $values['browseAbandonment'] ?? null;
        $this->cartAbandonment = $values['cartAbandonment'] ?? null;
        $this->priceDrop = $values['priceDrop'] ?? null;
    }
}
