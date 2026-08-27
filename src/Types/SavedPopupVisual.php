<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Media panel and urgency treatment. Merged key by key.
 */
class SavedPopupVisual extends JsonSerializableType
{
    /**
     * @var ?int $countdownMinutes
     */
    #[JsonProperty('countdownMinutes')]
    public ?int $countdownMinutes;

    /**
     * @var ?string $imageAlt
     */
    #[JsonProperty('imageAlt')]
    public ?string $imageAlt;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?value-of<SavedPopupVisualPlacement> $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?value-of<SavedPopupVisualStyle> $style
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @param array{
     *   countdownMinutes?: ?int,
     *   imageAlt?: ?string,
     *   imageUrl?: ?string,
     *   placement?: ?value-of<SavedPopupVisualPlacement>,
     *   style?: ?value-of<SavedPopupVisualStyle>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->countdownMinutes = $values['countdownMinutes'] ?? null;
        $this->imageAlt = $values['imageAlt'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->placement = $values['placement'] ?? null;
        $this->style = $values['style'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
