<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * PostHog and Segment only. Imports event history after connecting: PostHog reads the project archive (projectId + personalApiKey); Segment walks your existing contacts' Unify profiles (spaceId + profileApiToken) and covers at most the last 14 days the Profile API serves, because Segment has no bulk event export.
 */
class ConnectIntegrationsRequestHistoryImport extends JsonSerializableType
{
    /**
     * @var ?string $personalApiKey PostHog only. Personal API key with query read access.
     */
    #[JsonProperty('personalApiKey')]
    public ?string $personalApiKey;

    /**
     * @var ?string $profileApiToken Segment only. Profile API access token for the space.
     */
    #[JsonProperty('profileApiToken')]
    public ?string $profileApiToken;

    /**
     * @var ?string $projectId PostHog only. Numeric PostHog project ID.
     */
    #[JsonProperty('projectId')]
    public ?string $projectId;

    /**
     * @var value-of<ConnectIntegrationsRequestHistoryImportRegion> $region
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var ?string $spaceId Segment only. Unify space ID (spa_...).
     */
    #[JsonProperty('spaceId')]
    public ?string $spaceId;

    /**
     * @param array{
     *   region: value-of<ConnectIntegrationsRequestHistoryImportRegion>,
     *   personalApiKey?: ?string,
     *   profileApiToken?: ?string,
     *   projectId?: ?string,
     *   spaceId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->personalApiKey = $values['personalApiKey'] ?? null;
        $this->profileApiToken = $values['profileApiToken'] ?? null;
        $this->projectId = $values['projectId'] ?? null;
        $this->region = $values['region'];
        $this->spaceId = $values['spaceId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
