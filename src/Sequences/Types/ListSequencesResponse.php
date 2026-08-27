<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SequenceSummary;
use Sequenzy\Core\Types\ArrayType;

class ListSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?ListSequencesResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?ListSequencesResponsePagination $pagination;

    /**
     * @var ?array<SequenceSummary> $sequences
     */
    #[JsonProperty('sequences'), ArrayType([SequenceSummary::class])]
    public ?array $sequences;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   pagination?: ?ListSequencesResponsePagination,
     *   sequences?: ?array<SequenceSummary>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pagination = $values['pagination'] ?? null;
        $this->sequences = $values['sequences'] ?? null;
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
