<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceTemplateSummary;
use Sequenzy\Core\Types\ArrayType;

class ListTemplatesSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<SequenceTemplateSummary> $templates
     */
    #[JsonProperty('templates'), ArrayType([SequenceTemplateSummary::class])]
    public ?array $templates;

    /**
     * @var ?string $websiteType Category the list was filtered to; null when unfiltered.
     */
    #[JsonProperty('websiteType')]
    public ?string $websiteType;

    /**
     * @param array{
     *   success?: ?bool,
     *   templates?: ?array<SequenceTemplateSummary>,
     *   websiteType?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->templates = $values['templates'] ?? null;
        $this->websiteType = $values['websiteType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
