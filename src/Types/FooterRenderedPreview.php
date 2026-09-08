<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class FooterRenderedPreview extends JsonSerializableType
{
    /**
     * @var ?string $footerHtml
     */
    #[JsonProperty('footerHtml')]
    public ?string $footerHtml;

    /**
     * @var ?string $note
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var ?array<FooterRenderedPreviewSamplesItem> $samples
     */
    #[JsonProperty('samples'), ArrayType([FooterRenderedPreviewSamplesItem::class])]
    public ?array $samples;

    /**
     * @param array{
     *   footerHtml?: ?string,
     *   note?: ?string,
     *   samples?: ?array<FooterRenderedPreviewSamplesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->footerHtml = $values['footerHtml'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->samples = $values['samples'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
