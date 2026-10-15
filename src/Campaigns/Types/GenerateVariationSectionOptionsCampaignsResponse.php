<?php

namespace Sequenzy\Campaigns\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailSectionOption;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GenerateVariationSectionOptionsCampaignsResponse extends JsonSerializableType
{
    /**
     * @var ?array<EmailSectionOption> $options
     */
    #[JsonProperty('options'), ArrayType([EmailSectionOption::class])]
    public ?array $options;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   options?: ?array<EmailSectionOption>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->options = $values['options'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
