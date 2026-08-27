<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UpdateSyncIntegrationsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $listIds Lists that contacts created by this integration join, applied from the provider's next write onward. `null` clears the choice so they follow the workspace default lists; `[]` means they join no list; a populated array means exactly those lists. Every ID must belong to this company.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?bool $syncEnabled True to enable bulk imports and backfills, false to pause them. This does not stop the provider's live webhook creating contacts.
     */
    #[JsonProperty('syncEnabled')]
    public ?bool $syncEnabled;

    /**
     * @param array{
     *   listIds?: ?array<string>,
     *   syncEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listIds = $values['listIds'] ?? null;
        $this->syncEnabled = $values['syncEnabled'] ?? null;
    }
}
