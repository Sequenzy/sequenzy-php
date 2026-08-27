<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * What an integration provider does, independent of whether it is connected.
 */
class IntegrationProviderCapability extends JsonSerializableType
{
    /**
     * @var ?array<value-of<IntegrationProviderCapabilityActionsItem>> $actions
     */
    #[JsonProperty('actions'), ArrayType(['string'])]
    public ?array $actions;

    /**
     * @var ?value-of<IntegrationProviderCapabilityAvailability> $availability A coming_soon provider appears in the dashboard picker but has no webhook handler yet, so it emits nothing.
     */
    #[JsonProperty('availability')]
    public ?string $availability;

    /**
     * @var ?value-of<IntegrationProviderCapabilityCategory> $category
     */
    #[JsonProperty('category')]
    public ?string $category;

    /**
     * @var ?array<IntegrationProviderCapabilityConnectFieldsItem> $connectFields Fields POST /integrations/connect accepts for this provider. Present exactly when actions includes connect.
     */
    #[JsonProperty('connectFields'), ArrayType([IntegrationProviderCapabilityConnectFieldsItem::class])]
    public ?array $connectFields;

    /**
     * @var ?value-of<IntegrationProviderCapabilityConnectMethod> $connectMethod
     */
    #[JsonProperty('connectMethod')]
    public ?string $connectMethod;

    /**
     * @var ?array<IntegrationProviderCapabilityEmitsItem> $emits Every event the provider can produce. Empty when it never triggers automations.
     */
    #[JsonProperty('emits'), ArrayType([IntegrationProviderCapabilityEmitsItem::class])]
    public ?array $emits;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $notes Caveats worth knowing before building on the provider.
     */
    #[JsonProperty('notes'), ArrayType(['string'])]
    public ?array $notes;

    /**
     * @var ?string $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $summary
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?array<string> $syncs What the integration keeps in sync. Empty when it only pushes events as they happen.
     */
    #[JsonProperty('syncs'), ArrayType(['string'])]
    public ?array $syncs;

    /**
     * @var ?array<IntegrationProviderCapabilityWritesAttributesItem> $writesAttributes
     */
    #[JsonProperty('writesAttributes'), ArrayType([IntegrationProviderCapabilityWritesAttributesItem::class])]
    public ?array $writesAttributes;

    /**
     * @param array{
     *   actions?: ?array<value-of<IntegrationProviderCapabilityActionsItem>>,
     *   availability?: ?value-of<IntegrationProviderCapabilityAvailability>,
     *   category?: ?value-of<IntegrationProviderCapabilityCategory>,
     *   connectFields?: ?array<IntegrationProviderCapabilityConnectFieldsItem>,
     *   connectMethod?: ?value-of<IntegrationProviderCapabilityConnectMethod>,
     *   emits?: ?array<IntegrationProviderCapabilityEmitsItem>,
     *   name?: ?string,
     *   notes?: ?array<string>,
     *   provider?: ?string,
     *   summary?: ?string,
     *   syncs?: ?array<string>,
     *   writesAttributes?: ?array<IntegrationProviderCapabilityWritesAttributesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->actions = $values['actions'] ?? null;
        $this->availability = $values['availability'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->connectFields = $values['connectFields'] ?? null;
        $this->connectMethod = $values['connectMethod'] ?? null;
        $this->emits = $values['emits'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->summary = $values['summary'] ?? null;
        $this->syncs = $values['syncs'] ?? null;
        $this->writesAttributes = $values['writesAttributes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
