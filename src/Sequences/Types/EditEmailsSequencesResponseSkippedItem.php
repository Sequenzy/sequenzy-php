<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EditEmailsSequencesResponseSkippedItem extends JsonSerializableType
{
    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $nodeId
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?value-of<EditEmailsSequencesResponseSkippedItemReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   emailId?: ?string,
     *   label?: ?string,
     *   nodeId?: ?string,
     *   reason?: ?value-of<EditEmailsSequencesResponseSkippedItemReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailId = $values['emailId'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
