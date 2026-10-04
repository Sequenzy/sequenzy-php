<?php

namespace Sequenzy\Templates\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewFromExampleTemplatesResponsePreview extends JsonSerializableType
{
    /**
     * @var ?string $brandName The brand it is written for.
     */
    #[JsonProperty('brandName')]
    public ?string $brandName;

    /**
     * @var ?string $html The rewritten email as HTML.
     */
    #[JsonProperty('html')]
    public ?string $html;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?string $website The normalized `website` it was written for, or `null` for your own brand.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @param array{
     *   brandName?: ?string,
     *   html?: ?string,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   website?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandName = $values['brandName'] ?? null;
        $this->html = $values['html'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
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
