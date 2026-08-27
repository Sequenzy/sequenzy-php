<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateSyncIntegrationsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $changed False when the integration was already in the requested state.
     */
    #[JsonProperty('changed')]
    public ?bool $changed;

    /**
     * @var ?array<string> $changedFields Which controls actually moved.
     */
    #[JsonProperty('changedFields'), ArrayType(['string'])]
    public ?array $changedFields;

    /**
     * @var ?string $integrationId
     */
    #[JsonProperty('integrationId')]
    public ?string $integrationId;

    /**
     * @var ?array<string> $listIds Configured target lists. Null means new contacts follow the workspace default lists.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?value-of<UpdateSyncIntegrationsResponseListTargeting> $listTargeting Where contacts created by this integration land. Null for providers that ignore per-integration list targeting.
     */
    #[JsonProperty('listTargeting')]
    public ?string $listTargeting;

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
     * @var ?bool $syncEnabled Bulk import and backfill state after the update.
     */
    #[JsonProperty('syncEnabled')]
    public ?bool $syncEnabled;

    /**
     * @param array{
     *   changed?: ?bool,
     *   changedFields?: ?array<string>,
     *   integrationId?: ?string,
     *   listIds?: ?array<string>,
     *   listTargeting?: ?value-of<UpdateSyncIntegrationsResponseListTargeting>,
     *   message?: ?string,
     *   provider?: ?string,
     *   success?: ?bool,
     *   syncEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->changed = $values['changed'] ?? null;
        $this->changedFields = $values['changedFields'] ?? null;
        $this->integrationId = $values['integrationId'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->listTargeting = $values['listTargeting'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->syncEnabled = $values['syncEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
