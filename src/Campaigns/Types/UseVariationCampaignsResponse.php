<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailVariation;
use Sequenzy\Core\Json\JsonProperty;

class UseVariationCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?EmailVariation $savedPrevious The email's previous content, saved as a variation. Null when it already was one.
     */
    #[JsonProperty('savedPrevious')]
    public ?EmailVariation $savedPrevious;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?EmailVariation $variation
     */
    #[JsonProperty('variation')]
    public ?EmailVariation $variation;

    /**
     * @param array{
     *   savedPrevious?: ?EmailVariation,
     *   success?: ?bool,
     *   variation?: ?EmailVariation,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->savedPrevious = $values['savedPrevious'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->variation = $values['variation'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
