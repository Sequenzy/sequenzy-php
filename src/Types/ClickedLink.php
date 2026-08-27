<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * One destination URL from the campaign's per-link click breakdown. Returned as a top-level `clickedLinks` array by the campaign metrics endpoint when the campaign has tracked link clicks.
 */
class ClickedLink extends JsonSerializableType
{
    /**
     * @var ?int $clicks Number of recorded clicks on this URL.
     */
    #[JsonProperty('clicks')]
    public ?int $clicks;

    /**
     * @var ?float $percentage This link's share of every recorded link click (0-100), including links beyond the returned top 20.
     */
    #[JsonProperty('percentage')]
    public ?float $percentage;

    /**
     * @var ?string $url The clicked destination URL as sent in the email.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   clicks?: ?int,
     *   percentage?: ?float,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicks = $values['clicks'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
