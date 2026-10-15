<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class LinkClickBreakdownLinksItem extends JsonSerializableType
{
    /**
     * @var int $clicks Every recorded click on the destination, repeats included.
     */
    #[JsonProperty('clicks')]
    public int $clicks;

    /**
     * @var float $share Percentage of `totalUniqueClicks`, rounded to two decimals.
     */
    #[JsonProperty('share')]
    public float $share;

    /**
     * @var int $uniqueClicks Subscribers who clicked the destination, each counted once however often they clicked. Recipients without a subscriber record count once per email.
     */
    #[JsonProperty('uniqueClicks')]
    public int $uniqueClicks;

    /**
     * @var string $url Destination URL without query string, fragment or trailing slash.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   clicks: int,
     *   share: float,
     *   uniqueClicks: int,
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->clicks = $values['clicks'];
        $this->share = $values['share'];
        $this->uniqueClicks = $values['uniqueClicks'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
