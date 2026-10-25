<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListSuggestionsIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?ListSuggestionsIntegrationsResponsePaymentProviders $paymentProviders Present when the website lists pricing and no payment or commerce integration is connected; null otherwise.
     */
    #[JsonProperty('paymentProviders')]
    public ?ListSuggestionsIntegrationsResponsePaymentProviders $paymentProviders;

    /**
     * @var bool $scanComplete False while onboarding is still reading the website, including the tool scan, which can finish a few seconds after the rest. An empty list then means the site has not been scanned yet, not that nothing was found.
     */
    #[JsonProperty('scanComplete')]
    public bool $scanComplete;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<ListSuggestionsIntegrationsResponseSuggestionsItem> $suggestions Detected providers that are not connected, in suggestion order.
     */
    #[JsonProperty('suggestions'), ArrayType([ListSuggestionsIntegrationsResponseSuggestionsItem::class])]
    public array $suggestions;

    /**
     * @var ?string $websiteUrl The company website the suggestions were read from.
     */
    #[JsonProperty('websiteUrl')]
    public ?string $websiteUrl;

    /**
     * @param array{
     *   scanComplete: bool,
     *   success: bool,
     *   suggestions: array<ListSuggestionsIntegrationsResponseSuggestionsItem>,
     *   paymentProviders?: ?ListSuggestionsIntegrationsResponsePaymentProviders,
     *   websiteUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->paymentProviders = $values['paymentProviders'] ?? null;
        $this->scanComplete = $values['scanComplete'];
        $this->success = $values['success'];
        $this->suggestions = $values['suggestions'];
        $this->websiteUrl = $values['websiteUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
