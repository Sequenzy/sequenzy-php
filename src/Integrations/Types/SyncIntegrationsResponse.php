<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SyncIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?string $integrationId
     */
    #[JsonProperty('integrationId')]
    public ?string $integrationId;

    /**
     * @var ?string $jobId
     */
    #[JsonProperty('jobId')]
    public ?string $jobId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $syncStatus
     */
    #[JsonProperty('syncStatus')]
    public ?string $syncStatus;

    /**
     * @var ?SyncIntegrationsResponseSyncTarget $syncTarget Supabase only - the source the backfill reads. Absent for providers whose sync has no configurable source.
     */
    #[JsonProperty('syncTarget')]
    public ?SyncIntegrationsResponseSyncTarget $syncTarget;

    /**
     * @param array{
     *   integrationId?: ?string,
     *   jobId?: ?string,
     *   message?: ?string,
     *   provider?: ?string,
     *   success?: ?bool,
     *   syncStatus?: ?string,
     *   syncTarget?: ?SyncIntegrationsResponseSyncTarget,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->integrationId = $values['integrationId'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->syncStatus = $values['syncStatus'] ?? null;
        $this->syncTarget = $values['syncTarget'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
