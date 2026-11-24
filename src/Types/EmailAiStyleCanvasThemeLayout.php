<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailAiStyleCanvasThemeLayout extends JsonSerializableType
{
    /**
     * @var ?value-of<EmailAiStyleCanvasThemeLayoutContentAlign> $contentAlign
     */
    #[JsonProperty('contentAlign')]
    public ?string $contentAlign;

    /**
     * @var ?value-of<EmailAiStyleCanvasThemeLayoutContentWidthMode> $contentWidthMode
     */
    #[JsonProperty('contentWidthMode')]
    public ?string $contentWidthMode;

    /**
     * @param array{
     *   contentAlign?: ?value-of<EmailAiStyleCanvasThemeLayoutContentAlign>,
     *   contentWidthMode?: ?value-of<EmailAiStyleCanvasThemeLayoutContentWidthMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentAlign = $values['contentAlign'] ?? null;
        $this->contentWidthMode = $values['contentWidthMode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
