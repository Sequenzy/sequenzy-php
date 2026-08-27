<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Landing page builder JSON.
 */
class LandingPageContent extends JsonSerializableType
{
    /**
     * @var array<array<string, mixed>> $blocks Page blocks. Each block has a `slot`, rendered in order: `top` (full-width band above the hero), `hero`, `form` (the card beside the hero), `body`, `footer`. A `video` block embeds a pasted YouTube URL from its `url`; other providers and direct video files are not supported. It accepts an optional `aspectRatio` of 16:9, 4:3, 1:1, or 9:16. Button `url` and pricing `buttonUrl` accept an https URL or an in-page anchor: `#form` scrolls to the page's form block, `#section-<sectionId>` and `#block-<blockId>` scroll to any section or block, and `#top` returns to the top. Anchor CTAs open in the same tab.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public array $blocks;

    /**
     * @var ?LandingPageContentSeo $seo Search and browser metadata for the published page.
     */
    #[JsonProperty('seo')]
    public ?LandingPageContentSeo $seo;

    /**
     * @var ?string $template
     */
    #[JsonProperty('template')]
    public ?string $template;

    /**
     * @var ?LandingPageContentTheme $theme Page-wide design settings.
     */
    #[JsonProperty('theme')]
    public ?LandingPageContentTheme $theme;

    /**
     * @var int $version
     */
    #[JsonProperty('version')]
    public int $version;

    /**
     * @param array{
     *   blocks: array<array<string, mixed>>,
     *   version: int,
     *   seo?: ?LandingPageContentSeo,
     *   template?: ?string,
     *   theme?: ?LandingPageContentTheme,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'];
        $this->seo = $values['seo'] ?? null;
        $this->template = $values['template'] ?? null;
        $this->theme = $values['theme'] ?? null;
        $this->version = $values['version'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
