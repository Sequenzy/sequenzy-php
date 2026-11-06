<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * PostHog, Segment, and Amplitude: event delivery scope. PostHog also takes matchByDistinctId. Mixpanel takes no settings. Attio: listMap (Sequenzy list id to Attio list id or slug) and syncCompanyFromDomain. SparkLoop: listIds for new referrals. On a PostHog reconnect, the settings you pass merge onto the stored ones.
 */
class ConnectIntegrationsRequestSettings extends JsonSerializableType
{
    /**
     * @var ?array<string> $eventAllowlist
     */
    #[JsonProperty('eventAllowlist'), ArrayType(['string'])]
    public ?array $eventAllowlist;

    /**
     * @var ?array<string> $listIds SparkLoop only. Lists new referrals join. Omit to keep the current choice (the workspace default lists on a first connect), null to reset to the workspace default lists, or an empty array for none.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?array<string, string> $listMap Attio only. Sequenzy list id to Attio list UUID or slug.
     */
    #[JsonProperty('listMap'), ArrayType(['string' => 'string'])]
    public ?array $listMap;

    /**
     * @var ?bool $matchByDistinctId PostHog only. Match events without an email to the existing contact whose externalId (or the posthogDistinctId a previous $identify stored) equals the event's distinct_id. Never creates contacts. New connections default to true; integrations connected earlier keep false until you turn it on.
     */
    #[JsonProperty('matchByDistinctId')]
    public ?bool $matchByDistinctId;

    /**
     * @var ?bool $skipInternalEvents Skip provider-internal events (PostHog $ events, Segment page/screen, Amplitude session_start, session_end, and [Amplitude] autocapture) unless allowlisted. Identify calls always pass. New Segment and Amplitude connections default to true, as do new PostHog connections made without settings.
     */
    #[JsonProperty('skipInternalEvents')]
    public ?bool $skipInternalEvents;

    /**
     * @var ?bool $syncAllEvents
     */
    #[JsonProperty('syncAllEvents')]
    public ?bool $syncAllEvents;

    /**
     * @var ?bool $syncCompanyFromDomain Attio only. Upsert a company from the person's non-free-mail email domain.
     */
    #[JsonProperty('syncCompanyFromDomain')]
    public ?bool $syncCompanyFromDomain;

    /**
     * @param array{
     *   eventAllowlist?: ?array<string>,
     *   listIds?: ?array<string>,
     *   listMap?: ?array<string, string>,
     *   matchByDistinctId?: ?bool,
     *   skipInternalEvents?: ?bool,
     *   syncAllEvents?: ?bool,
     *   syncCompanyFromDomain?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventAllowlist = $values['eventAllowlist'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->listMap = $values['listMap'] ?? null;
        $this->matchByDistinctId = $values['matchByDistinctId'] ?? null;
        $this->skipInternalEvents = $values['skipInternalEvents'] ?? null;
        $this->syncAllEvents = $values['syncAllEvents'] ?? null;
        $this->syncCompanyFromDomain = $values['syncCompanyFromDomain'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
