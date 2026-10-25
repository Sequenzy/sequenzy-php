<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Present when the website lists pricing and no payment or commerce integration is connected; null otherwise.
 */
class ListSuggestionsIntegrationsResponsePaymentProviders extends JsonSerializableType
{
    /**
     * @var int $pricingPlanCount Pricing plans read from the website or entered in settings.
     */
    #[JsonProperty('pricingPlanCount')]
    public int $pricingPlanCount;

    /**
     * @var array<ListSuggestionsIntegrationsResponsePaymentProvidersProvidersItem> $providers Every available payment provider.
     */
    #[JsonProperty('providers'), ArrayType([ListSuggestionsIntegrationsResponsePaymentProvidersProvidersItem::class])]
    public array $providers;

    /**
     * @var value-of<ListSuggestionsIntegrationsResponsePaymentProvidersReason> $reason
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   pricingPlanCount: int,
     *   providers: array<ListSuggestionsIntegrationsResponsePaymentProvidersProvidersItem>,
     *   reason: value-of<ListSuggestionsIntegrationsResponsePaymentProvidersReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pricingPlanCount = $values['pricingPlanCount'];
        $this->providers = $values['providers'];
        $this->reason = $values['reason'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
