<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class TemplateAbTestReference extends JsonSerializableType
{
    /**
     * @var string $abTestId
     */
    #[JsonProperty('abTestId')]
    public string $abTestId;

    /**
     * @var AbTestContentEditing $contentEditing
     */
    #[JsonProperty('contentEditing')]
    public AbTestContentEditing $contentEditing;

    /**
     * @var array<TemplateAbTestVariantReference> $variants
     */
    #[JsonProperty('variants'), ArrayType([TemplateAbTestVariantReference::class])]
    public array $variants;

    /**
     * @param array{
     *   abTestId: string,
     *   contentEditing: AbTestContentEditing,
     *   variants: array<TemplateAbTestVariantReference>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->abTestId = $values['abTestId'];
        $this->contentEditing = $values['contentEditing'];
        $this->variants = $values['variants'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
