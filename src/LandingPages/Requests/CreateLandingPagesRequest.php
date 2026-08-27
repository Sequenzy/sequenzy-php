<?php

namespace Sequenzy\LandingPages\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\LandingPageContent;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\LandingPages\Types\CreateLandingPagesRequestTemplate;

class CreateLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var ?LandingPageContent $content
     */
    #[JsonProperty('content')]
    public ?LandingPageContent $content;

    /**
     * @var ?string $name Landing page name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $slug URL slug. It is normalized and made unique for the company.
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?value-of<CreateLandingPagesRequestTemplate> $template Template key used when content is omitted.
     */
    #[JsonProperty('template')]
    public ?string $template;

    /**
     * @param array{
     *   content?: ?LandingPageContent,
     *   name?: ?string,
     *   slug?: ?string,
     *   template?: ?value-of<CreateLandingPagesRequestTemplate>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->content = $values['content'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->template = $values['template'] ?? null;
    }
}
