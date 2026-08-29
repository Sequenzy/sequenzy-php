<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailThemePatchColors extends JsonSerializableType
{
    /**
     * @var ?string $background Outer canvas behind the email.
     */
    #[JsonProperty('background')]
    public ?string $background;

    /**
     * @var ?string $border
     */
    #[JsonProperty('border')]
    public ?string $border;

    /**
     * @var ?string $buttonText
     */
    #[JsonProperty('buttonText')]
    public ?string $buttonText;

    /**
     * @var ?string $content Inner content card. Omit to preserve its current value; when no content color is stored, the card follows the outer canvas.
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?string $heading
     */
    #[JsonProperty('heading')]
    public ?string $heading;

    /**
     * @var ?string $link
     */
    #[JsonProperty('link')]
    public ?string $link;

    /**
     * @var ?string $mutedText
     */
    #[JsonProperty('mutedText')]
    public ?string $mutedText;

    /**
     * @var ?string $primary
     */
    #[JsonProperty('primary')]
    public ?string $primary;

    /**
     * @var ?string $surface Nested cards and tinted tiles.
     */
    #[JsonProperty('surface')]
    public ?string $surface;

    /**
     * @var ?string $text
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @param array{
     *   background?: ?string,
     *   border?: ?string,
     *   buttonText?: ?string,
     *   content?: ?string,
     *   heading?: ?string,
     *   link?: ?string,
     *   mutedText?: ?string,
     *   primary?: ?string,
     *   surface?: ?string,
     *   text?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->background = $values['background'] ?? null;
        $this->border = $values['border'] ?? null;
        $this->buttonText = $values['buttonText'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->heading = $values['heading'] ?? null;
        $this->link = $values['link'] ?? null;
        $this->mutedText = $values['mutedText'] ?? null;
        $this->primary = $values['primary'] ?? null;
        $this->surface = $values['surface'] ?? null;
        $this->text = $values['text'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
