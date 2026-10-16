<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class UseEmailVariationSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?array<UseEmailVariationSequencesResponseEmailsItem> $emails This email first, then, with scope all, every other editable email in sending order.
     */
    #[JsonProperty('emails'), ArrayType([UseEmailVariationSequencesResponseEmailsItem::class])]
    public ?array $emails;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   dryRun?: ?bool,
     *   emails?: ?array<UseEmailVariationSequencesResponseEmailsItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dryRun = $values['dryRun'] ?? null;
        $this->emails = $values['emails'] ?? null;
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
