<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Search and browser metadata for the published page.
 */
class LandingPageContentSeo extends JsonSerializableType
{
    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $faviconUrl Browser tab icon for the published page. Leave empty to fall back to the company logo.
     */
    #[JsonProperty('faviconUrl')]
    public ?string $faviconUrl;

    /**
     * @var ?bool $hideFromSearchEngines Adds a noindex, nofollow tag so crawlers keep the page out of search results. The page stays reachable by direct link.
     */
    #[JsonProperty('hideFromSearchEngines')]
    public ?bool $hideFromSearchEngines;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   description?: ?string,
     *   faviconUrl?: ?string,
     *   hideFromSearchEngines?: ?bool,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->faviconUrl = $values['faviconUrl'] ?? null;
        $this->hideFromSearchEngines = $values['hideFromSearchEngines'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
