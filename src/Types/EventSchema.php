<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * The published payload of one event. Listing mode returns the summary fields only; asking for a single eventName adds providers, mergeTagPrefix, and notes.
 */
class EventSchema extends JsonSerializableType
{
    /**
     * @var ?string $category
     */
    #[JsonProperty('category')]
    public ?string $category;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $documented Whether a reference payload is published. False never means the event name is invalid - custom events carry exactly the properties you send and are never rejected.
     */
    #[JsonProperty('documented')]
    public ?bool $documented;

    /**
     * @var ?array<value-of<EventSchemaDocumentedProvidersItem>> $documentedProviders Providers with a reference payload for this event.
     */
    #[JsonProperty('documentedProviders'), ArrayType(['string'])]
    public ?array $documentedProviders;

    /**
     * @var ?string $eventName Normalized event name - the name to trigger and to configure triggers on.
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $mergeTagPrefix
     */
    #[JsonProperty('mergeTagPrefix')]
    public ?string $mergeTagPrefix;

    /**
     * @var ?array<string> $notes
     */
    #[JsonProperty('notes'), ArrayType(['string'])]
    public ?array $notes;

    /**
     * @var ?array<EventSchemaProvidersItem> $providers Single-event mode only. One entry per provider.
     */
    #[JsonProperty('providers'), ArrayType([EventSchemaProvidersItem::class])]
    public ?array $providers;

    /**
     * @var ?string $requestedEventName The name as asked for, before alias normalization.
     */
    #[JsonProperty('requestedEventName')]
    public ?string $requestedEventName;

    /**
     * @param array{
     *   category?: ?string,
     *   description?: ?string,
     *   documented?: ?bool,
     *   documentedProviders?: ?array<value-of<EventSchemaDocumentedProvidersItem>>,
     *   eventName?: ?string,
     *   label?: ?string,
     *   mergeTagPrefix?: ?string,
     *   notes?: ?array<string>,
     *   providers?: ?array<EventSchemaProvidersItem>,
     *   requestedEventName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->category = $values['category'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->documented = $values['documented'] ?? null;
        $this->documentedProviders = $values['documentedProviders'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->mergeTagPrefix = $values['mergeTagPrefix'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->providers = $values['providers'] ?? null;
        $this->requestedEventName = $values['requestedEventName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
