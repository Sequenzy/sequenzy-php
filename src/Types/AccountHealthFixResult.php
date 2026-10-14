<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AccountHealthFixResult extends JsonSerializableType
{
    /**
     * @var ?bool $created False when an existing draft was returned.
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?value-of<AccountHealthFixResultEnrichmentStatus> $enrichmentStatus Only when created is true. `processing` while AI writes the emails; poll Get Sequence for progress. `not_queued` means the draft exists but writing could not start: open it in the dashboard to write the emails, and do not build it again.
     */
    #[JsonProperty('enrichmentStatus')]
    public ?string $enrichmentStatus;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   created?: ?bool,
     *   enrichmentStatus?: ?value-of<AccountHealthFixResultEnrichmentStatus>,
     *   sequenceId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->enrichmentStatus = $values['enrichmentStatus'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
