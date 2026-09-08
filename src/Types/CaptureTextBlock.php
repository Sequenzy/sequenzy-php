<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureTextBlock extends JsonSerializableType
{
    /**
     * @var value-of<CaptureTextBlockAlign> $align
     */
    #[JsonProperty('align')]
    public string $align;

    /**
     * @var string $content Inline HTML is sanitized. Visible text after stripping markup and trimming must contain at most 700 characters. maxLength limits the raw markup separately.
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @var value-of<CaptureTextBlockVariant> $variant
     */
    #[JsonProperty('variant')]
    public string $variant;

    /**
     * @param array{
     *   align: value-of<CaptureTextBlockAlign>,
     *   content: string,
     *   id: string,
     *   variant: value-of<CaptureTextBlockVariant>,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->align = $values['align'];
        $this->content = $values['content'];
        $this->id = $values['id'];
        $this->sectionId = $values['sectionId'] ?? null;
        $this->variant = $values['variant'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
