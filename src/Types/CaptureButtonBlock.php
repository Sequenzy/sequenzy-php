<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CaptureButtonBlock extends JsonSerializableType
{
    /**
     * @var value-of<CaptureButtonBlockAlign> $align
     */
    #[JsonProperty('align')]
    public string $align;

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
     * @var string $text
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var value-of<CaptureButtonBlockVariant> $variant
     */
    #[JsonProperty('variant')]
    public string $variant;

    /**
     * @param array{
     *   align: value-of<CaptureButtonBlockAlign>,
     *   id: string,
     *   text: string,
     *   url: string,
     *   variant: value-of<CaptureButtonBlockVariant>,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->align = $values['align'];
        $this->id = $values['id'];
        $this->sectionId = $values['sectionId'] ?? null;
        $this->text = $values['text'];
        $this->url = $values['url'];
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
