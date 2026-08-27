<?php

namespace Sequenzy\LandingPages\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DuplicateLandingPagesRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Name for the copy. Defaults to the original name with a "(copy)" suffix.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $slug Slug for the copy. Normalized and made unique within the company.
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @param array{
     *   name?: ?string,
     *   slug?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
    }
}
