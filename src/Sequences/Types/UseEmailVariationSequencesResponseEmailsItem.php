<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UseEmailVariationSequencesResponseEmailsItem extends JsonSerializableType
{
    /**
     * @var ?string $emailId
     */
    #[JsonProperty('emailId')]
    public ?string $emailId;

    /**
     * @var ?string $error Why a changed email wasn't saved, or a warning when only its translations or A/B copy couldn't be updated.
     */
    #[JsonProperty('error')]
    public ?string $error;

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
     * @var ?bool $saved
     */
    #[JsonProperty('saved')]
    public ?bool $saved;

    /**
     * @var ?value-of<UseEmailVariationSequencesResponseEmailsItemStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $summary
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @param array{
     *   emailId?: ?string,
     *   error?: ?string,
     *   label?: ?string,
     *   nodeId?: ?string,
     *   saved?: ?bool,
     *   status?: ?value-of<UseEmailVariationSequencesResponseEmailsItemStatus>,
     *   summary?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailId = $values['emailId'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->saved = $values['saved'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->summary = $values['summary'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
