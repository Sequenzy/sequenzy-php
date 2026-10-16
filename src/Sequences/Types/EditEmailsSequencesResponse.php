<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EditEmailsSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $dryRun Whether the changes were only returned, not saved.
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?array<EditEmailsSequencesResponseEmailsItem> $emails
     */
    #[JsonProperty('emails'), ArrayType([EditEmailsSequencesResponseEmailsItem::class])]
    public ?array $emails;

    /**
     * @var ?array<EditEmailsSequencesResponseSkippedItem> $skipped Email steps the AI can't edit here.
     */
    #[JsonProperty('skipped'), ArrayType([EditEmailsSequencesResponseSkippedItem::class])]
    public ?array $skipped;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   dryRun?: ?bool,
     *   emails?: ?array<EditEmailsSequencesResponseEmailsItem>,
     *   skipped?: ?array<EditEmailsSequencesResponseSkippedItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dryRun = $values['dryRun'] ?? null;
        $this->emails = $values['emails'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
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
