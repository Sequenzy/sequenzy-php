<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageImageItem extends JsonSerializableType
{
    /**
     * @var ?string $alt
     */
    #[JsonProperty('alt')]
    public ?string $alt;

    /**
     * @var ?string $linkUrl
     */
    #[JsonProperty('linkUrl')]
    public ?string $linkUrl;

    /**
     * @var ?string $src
     */
    #[JsonProperty('src')]
    public ?string $src;

    /**
     * @param array{
     *   alt?: ?string,
     *   linkUrl?: ?string,
     *   src?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->alt = $values['alt'] ?? null;
        $this->linkUrl = $values['linkUrl'] ?? null;
        $this->src = $values['src'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
