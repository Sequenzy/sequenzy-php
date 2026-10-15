<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Clicks per link destination. Destinations ignore query strings, fragments and trailing slashes, so the same page linked with different UTM tags counts as one link.
 */
class LinkClickBreakdown extends JsonSerializableType
{
    /**
     * @var array<LinkClickBreakdownLinksItem> $links Destinations ranked by unique clicks, then total clicks.
     */
    #[JsonProperty('links'), ArrayType([LinkClickBreakdownLinksItem::class])]
    public array $links;

    /**
     * @var int $totalClicks Click events across every destination in scope, repeats included, before `limit` is applied. `0` when nothing was clicked, in which case `links` is empty.
     */
    #[JsonProperty('totalClicks')]
    public int $totalClicks;

    /**
     * @var int $totalLinks Distinct destinations in scope, before `limit` is applied.
     */
    #[JsonProperty('totalLinks')]
    public int $totalLinks;

    /**
     * @var int $totalUniqueClicks Sum of every destination's `uniqueClicks` in scope, before `limit` is applied.
     */
    #[JsonProperty('totalUniqueClicks')]
    public int $totalUniqueClicks;

    /**
     * @param array{
     *   links: array<LinkClickBreakdownLinksItem>,
     *   totalClicks: int,
     *   totalLinks: int,
     *   totalUniqueClicks: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->links = $values['links'];
        $this->totalClicks = $values['totalClicks'];
        $this->totalLinks = $values['totalLinks'];
        $this->totalUniqueClicks = $values['totalUniqueClicks'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
