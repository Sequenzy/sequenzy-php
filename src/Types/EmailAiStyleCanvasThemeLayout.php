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
     * @param array{
     *   contentAlign?: ?value-of<EmailAiStyleCanvasThemeLayoutContentAlign>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contentAlign = $values['contentAlign'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
