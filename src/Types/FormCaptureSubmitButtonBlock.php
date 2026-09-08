<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class FormCaptureSubmitButtonBlock extends JsonSerializableType
{
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
     * @var ?value-of<FormCaptureSubmitButtonBlockWidth> $width
     */
    #[JsonProperty('width')]
    public ?string $width;

    /**
     * @param array{
     *   id: string,
     *   text: string,
     *   sectionId?: ?string,
     *   width?: ?value-of<FormCaptureSubmitButtonBlockWidth>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->sectionId = $values['sectionId'] ?? null;
        $this->text = $values['text'];
        $this->width = $values['width'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
