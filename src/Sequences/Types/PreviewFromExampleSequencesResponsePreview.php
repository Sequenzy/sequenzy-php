<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class PreviewFromExampleSequencesResponsePreview extends JsonSerializableType
{
    /**
     * @var ?string $brandName
     */
    #[JsonProperty('brandName')]
    public ?string $brandName;

    /**
     * @var ?array<PreviewFromExampleSequencesResponsePreviewEmailsItem> $emails
     */
    #[JsonProperty('emails'), ArrayType([PreviewFromExampleSequencesResponsePreviewEmailsItem::class])]
    public ?array $emails;

    /**
     * @var ?int $failedEmailCount Previewed emails that could not be written this time.
     */
    #[JsonProperty('failedEmailCount')]
    public ?int $failedEmailCount;

    /**
     * @var ?int $remainingEmailCount Emails in the example beyond the preview.
     */
    #[JsonProperty('remainingEmailCount')]
    public ?int $remainingEmailCount;

    /**
     * @var ?string $website The normalized `website` it was written for, or `null` for your own brand.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @param array{
     *   brandName?: ?string,
     *   emails?: ?array<PreviewFromExampleSequencesResponsePreviewEmailsItem>,
     *   failedEmailCount?: ?int,
     *   remainingEmailCount?: ?int,
     *   website?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandName = $values['brandName'] ?? null;
        $this->emails = $values['emails'] ?? null;
        $this->failedEmailCount = $values['failedEmailCount'] ?? null;
        $this->remainingEmailCount = $values['remainingEmailCount'] ?? null;
        $this->website = $values['website'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
