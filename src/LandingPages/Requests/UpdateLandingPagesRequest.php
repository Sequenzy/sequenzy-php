<?php

namespace Sequenzy\LandingPages\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\LandingPageContent;
use Sequenzy\Core\Json\JsonProperty;

class UpdateLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var ?LandingPageContent $content
     */
    #[JsonProperty('content')]
    public ?LandingPageContent $content;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @param array{
     *   content?: ?LandingPageContent,
     *   name?: ?string,
     *   slug?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->content = $values['content'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
    }
}
