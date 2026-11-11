<?php

namespace Sequenzy\Segments\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class DeleteSegmentsResponseAffectedSequencesItem extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<DeleteSegmentsResponseAffectedSequencesItemStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<value-of<DeleteSegmentsResponseAffectedSequencesItemUsagesItem>> $usages How the sequence used the segment: `trigger` (entered or left the segment), `condition` (a condition or split), `filter` (a segment rule in a trigger or step filter), `stop_condition` (exit when in the segment), `audience` (automatic, recurring or running audience enrollment).
     */
    #[JsonProperty('usages'), ArrayType(['string'])]
    public ?array $usages;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   status?: ?value-of<DeleteSegmentsResponseAffectedSequencesItemStatus>,
     *   usages?: ?array<value-of<DeleteSegmentsResponseAffectedSequencesItemUsagesItem>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->usages = $values['usages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
