<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Version 2 landing page builder document. Providing content on update replaces the whole document. Block IDs must be unique throughout the tree. A missing footer is appended automatically; after normalization exactly one footer and at most one form are allowed. Groups may nest at most eight levels, and every child must share its parent slot. See /api-reference/landing-pages/content for block examples and semantic validation. Form and footer blocks must stay at the root, outside groups.
 */
class LandingPageContent extends JsonSerializableType
{
    /**
     * @var array<LandingPageBlock> $blocks Blocks render in slot order: top, hero, form, body, footer, preserving order within each slot. Includes nested group children. An empty array is accepted: a default footer is appended whenever no footer is present. The stored document has exactly one footer.
     */
    #[JsonProperty('blocks'), ArrayType([LandingPageBlock::class])]
    public array $blocks;

    /**
     * @var ?LandingPageHeader $header
     */
    #[JsonProperty('header')]
    public ?LandingPageHeader $header;

    /**
     * @var ?LandingPageSeo $seo
     */
    #[JsonProperty('seo')]
    public ?LandingPageSeo $seo;

    /**
     * @var ?value-of<LandingPageContentTemplate> $template
     */
    #[JsonProperty('template')]
    public ?string $template;

    /**
     * @var ?LandingPageTheme $theme
     */
    #[JsonProperty('theme')]
    public ?LandingPageTheme $theme;

    /**
     * @var int $version
     */
    #[JsonProperty('version')]
    public int $version;

    /**
     * @param array{
     *   blocks: array<LandingPageBlock>,
     *   version: int,
     *   header?: ?LandingPageHeader,
     *   seo?: ?LandingPageSeo,
     *   template?: ?value-of<LandingPageContentTemplate>,
     *   theme?: ?LandingPageTheme,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blocks = $values['blocks'];
        $this->header = $values['header'] ?? null;
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
