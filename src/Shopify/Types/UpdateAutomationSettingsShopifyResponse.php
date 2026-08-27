<?php

namespace Sequenzy\Shopify\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ShopifyBrowseAbandonmentSettings;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\ShopifyCartAbandonmentSettings;
use Sequenzy\Types\ShopifyPriceDropSettings;

class UpdateAutomationSettingsShopifyResponse extends JsonSerializableType
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
     * @var ?string $integrationId
     */
    #[JsonProperty('integrationId')]
    public ?string $integrationId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?ShopifyPriceDropSettings $priceDrop
     */
    #[JsonProperty('priceDrop')]
    public ?ShopifyPriceDropSettings $priceDrop;

    /**
     * @var ?string $shopDomain
     */
    #[JsonProperty('shopDomain')]
    public ?string $shopDomain;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   browseAbandonment?: ?ShopifyBrowseAbandonmentSettings,
     *   cartAbandonment?: ?ShopifyCartAbandonmentSettings,
     *   integrationId?: ?string,
     *   message?: ?string,
     *   priceDrop?: ?ShopifyPriceDropSettings,
     *   shopDomain?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->browseAbandonment = $values['browseAbandonment'] ?? null;
        $this->cartAbandonment = $values['cartAbandonment'] ?? null;
        $this->integrationId = $values['integrationId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->priceDrop = $values['priceDrop'] ?? null;
        $this->shopDomain = $values['shopDomain'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
