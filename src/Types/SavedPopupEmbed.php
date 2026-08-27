<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Deployment snippets for a published popup. Present only when the popup is published; they contain no API key.
 */
class SavedPopupEmbed extends JsonSerializableType
{
    /**
     * @var ?string $javascript
     */
    #[JsonProperty('javascript')]
    public ?string $javascript;

    /**
     * @var ?string $react
     */
    #[JsonProperty('react')]
    public ?string $react;

    /**
     * @var ?string $scriptUrl
     */
    #[JsonProperty('scriptUrl')]
    public ?string $scriptUrl;

    /**
     * @var ?string $shopify
     */
    #[JsonProperty('shopify')]
    public ?string $shopify;

    /**
     * @var ?array<string> $supportedPlatforms
     */
    #[JsonProperty('supportedPlatforms'), ArrayType(['string'])]
    public ?array $supportedPlatforms;

    /**
     * @var ?string $wordpress
     */
    #[JsonProperty('wordpress')]
    public ?string $wordpress;

    /**
     * @param array{
     *   javascript?: ?string,
     *   react?: ?string,
     *   scriptUrl?: ?string,
     *   shopify?: ?string,
     *   supportedPlatforms?: ?array<string>,
     *   wordpress?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->javascript = $values['javascript'] ?? null;
        $this->react = $values['react'] ?? null;
        $this->scriptUrl = $values['scriptUrl'] ?? null;
        $this->shopify = $values['shopify'] ?? null;
        $this->supportedPlatforms = $values['supportedPlatforms'] ?? null;
        $this->wordpress = $values['wordpress'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
