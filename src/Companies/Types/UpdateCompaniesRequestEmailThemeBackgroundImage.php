<?php

namespace Sequenzy\Companies\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Optional email-level background image painted over the solid fallback color (classic Windows Outlook falls back to the solid color). Pass null to remove it.
 */
class UpdateCompaniesRequestEmailThemeBackgroundImage extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemeBackgroundImageFit> $fit "cover" (default) scales to fill; "tile" repeats at natural size for textures.
     */
    #[JsonProperty('fit')]
    public ?string $fit;

    /**
     * @var ?float $shade 0-100 tint of the fallback background color over the image for contrast (default 0).
     */
    #[JsonProperty('shade')]
    public ?float $shade;

    /**
     * @var ?string $src Full http:// or https:// image URL without spaces, quotes, or merge tags.
     */
    #[JsonProperty('src')]
    public ?string $src;

    /**
     * @var ?value-of<UpdateCompaniesRequestEmailThemeBackgroundImageTarget> $target "both" (default) paints the outer canvas and content seamlessly; "content" paints the content card only; "canvas" paints the outer page behind a solid content card.
     */
    #[JsonProperty('target')]
    public ?string $target;

    /**
     * @param array{
     *   fit?: ?value-of<UpdateCompaniesRequestEmailThemeBackgroundImageFit>,
     *   shade?: ?float,
     *   src?: ?string,
     *   target?: ?value-of<UpdateCompaniesRequestEmailThemeBackgroundImageTarget>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fit = $values['fit'] ?? null;
        $this->shade = $values['shade'] ?? null;
        $this->src = $values['src'] ?? null;
        $this->target = $values['target'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
