<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageHeader extends JsonSerializableType
{
    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?int $logoSize
     */
    #[JsonProperty('logoSize')]
    public ?int $logoSize;

    /**
     * @var ?string $logoUrl
     */
    #[JsonProperty('logoUrl')]
    public ?string $logoUrl;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $showLogo
     */
    #[JsonProperty('showLogo')]
    public ?bool $showLogo;

    /**
     * @var ?bool $showName
     */
    #[JsonProperty('showName')]
    public ?bool $showName;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   logoSize?: ?int,
     *   logoUrl?: ?string,
     *   name?: ?string,
     *   showLogo?: ?bool,
     *   showName?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->logoSize = $values['logoSize'] ?? null;
        $this->logoUrl = $values['logoUrl'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->showLogo = $values['showLogo'] ?? null;
        $this->showName = $values['showName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
