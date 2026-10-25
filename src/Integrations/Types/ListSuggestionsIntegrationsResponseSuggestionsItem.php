<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ListSuggestionsIntegrationsResponseSuggestionsItem extends JsonSerializableType
{
    /**
     * @var string $category
     */
    #[JsonProperty('category')]
    public string $category;

    /**
     * @var value-of<ListSuggestionsIntegrationsResponseSuggestionsItemEvidence> $evidence Where the provider was found. storefront means the site runs on Shopify.
     */
    #[JsonProperty('evidence')]
    public string $evidence;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<ListSuggestionsIntegrationsResponseSuggestionsItemProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var ?string $shopDomain The myshopify.com domain for a Shopify suggestion when one was found; null otherwise.
     */
    #[JsonProperty('shopDomain')]
    public ?string $shopDomain;

    /**
     * @param array{
     *   category: string,
     *   evidence: value-of<ListSuggestionsIntegrationsResponseSuggestionsItemEvidence>,
     *   name: string,
     *   provider: value-of<ListSuggestionsIntegrationsResponseSuggestionsItemProvider>,
     *   shopDomain?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->category = $values['category'];
        $this->evidence = $values['evidence'];
        $this->name = $values['name'];
        $this->provider = $values['provider'];
        $this->shopDomain = $values['shopDomain'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
