<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailVariation;

class EditVariationCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $summary What the edit changed, in a sentence.
     */
    #[JsonProperty('summary')]
    public ?string $summary;

    /**
     * @var ?EmailVariation $variation
     */
    #[JsonProperty('variation')]
    public ?EmailVariation $variation;

    /**
     * @param array{
     *   success?: ?bool,
     *   summary?: ?string,
     *   variation?: ?EmailVariation,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->summary = $values['summary'] ?? null;
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
