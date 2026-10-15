<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailVariation;
use Sequenzy\Core\Types\ArrayType;

class GenerateVariationsCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<EmailVariation> $variations
     */
    #[JsonProperty('variations'), ArrayType([EmailVariation::class])]
    public ?array $variations;

    /**
     * @param array{
     *   success?: ?bool,
     *   variations?: ?array<EmailVariation>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->variations = $values['variations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
