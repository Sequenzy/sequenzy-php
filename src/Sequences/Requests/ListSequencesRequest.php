<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceStatus;

class ListSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $label Alias for labels. Takes precedence if both are present.
     */
    public ?string $label;

    /**
     * @var ?string $labels Comma-separated dashboard label names. The label alias is also accepted.
     */
    public ?string $labels;

    /**
     * @var ?int $limit Page size, up to 100. When limit and offset are both omitted, every sequence is returned.
     */
    public ?int $limit;

    /**
     * @var ?int $offset
     */
    public ?int $offset;

    /**
     * @var ?string $search Case-insensitive name or description search.
     */
    public ?string $search;

    /**
     * @var ?value-of<SequenceStatus> $status
     */
    public ?string $status;

    /**
     * @param array{
     *   label?: ?string,
     *   labels?: ?string,
     *   limit?: ?int,
     *   offset?: ?int,
     *   search?: ?string,
     *   status?: ?value-of<SequenceStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
        $this->labels = $values['labels'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
