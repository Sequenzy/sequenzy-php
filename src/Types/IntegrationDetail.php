<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class IntegrationDetail extends JsonSerializableType
{
    /**
     * @var ?array<string> $accountNeverReceivedEvents Provider event names the account has never received from any source. Not integration-specific.
     */
    #[JsonProperty('accountNeverReceivedEvents'), ArrayType(['string'])]
    public ?array $accountNeverReceivedEvents;

    /**
     * @var ?IntegrationDetailActivity $activity
     */
    #[JsonProperty('activity')]
    public ?IntegrationDetailActivity $activity;

    /**
     * @var ?array<string> $availableActions Actions callable right now given the integration's current state.
     */
    #[JsonProperty('availableActions'), ArrayType(['string'])]
    public ?array $availableActions;

    /**
     * @var ?IntegrationProviderCapability $capabilities
     */
    #[JsonProperty('capabilities')]
    public ?IntegrationProviderCapability $capabilities;

    /**
     * @var ?array<IntegrationEventWiring> $events
     */
    #[JsonProperty('events'), ArrayType([IntegrationEventWiring::class])]
    public ?array $events;

    /**
     * @var ?IntegrationDetailIngestion $ingestion What this integration does to the contact list: whether bulk backfills run, and which lists the contacts created by the provider's live webhook join. Neither setting stops that webhook creating contacts.
     */
    #[JsonProperty('ingestion')]
    public ?IntegrationDetailIngestion $ingestion;

    /**
     * @var ?IntegrationDetailIntegration $integration
     */
    #[JsonProperty('integration')]
    public ?IntegrationDetailIntegration $integration;

    /**
     * @var ?IntegrationDetailPixel $pixel Shopify only: live storefront tracking pixel state, read from the store on every call. Null for providers without a pixel. Same shape as the pixel endpoint, plus healthy and dependentEvents.
     */
    #[JsonProperty('pixel')]
    public ?IntegrationDetailPixel $pixel;

    /**
     * @var ?array<IntegrationDetailRecommendationsItem> $recommendations
     */
    #[JsonProperty('recommendations'), ArrayType([IntegrationDetailRecommendationsItem::class])]
    public ?array $recommendations;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<string> $unusedEvents Events the provider emits that no sequence triggers on.
     */
    #[JsonProperty('unusedEvents'), ArrayType(['string'])]
    public ?array $unusedEvents;

    /**
     * @param array{
     *   accountNeverReceivedEvents?: ?array<string>,
     *   activity?: ?IntegrationDetailActivity,
     *   availableActions?: ?array<string>,
     *   capabilities?: ?IntegrationProviderCapability,
     *   events?: ?array<IntegrationEventWiring>,
     *   ingestion?: ?IntegrationDetailIngestion,
     *   integration?: ?IntegrationDetailIntegration,
     *   pixel?: ?IntegrationDetailPixel,
     *   recommendations?: ?array<IntegrationDetailRecommendationsItem>,
     *   success?: ?bool,
     *   unusedEvents?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountNeverReceivedEvents = $values['accountNeverReceivedEvents'] ?? null;
        $this->activity = $values['activity'] ?? null;
        $this->availableActions = $values['availableActions'] ?? null;
        $this->capabilities = $values['capabilities'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->ingestion = $values['ingestion'] ?? null;
        $this->integration = $values['integration'] ?? null;
        $this->pixel = $values['pixel'] ?? null;
        $this->recommendations = $values['recommendations'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->unusedEvents = $values['unusedEvents'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
