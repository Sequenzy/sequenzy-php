<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class BadRequestErrorBodyDetails extends JsonSerializableType
{
    /**
     * @var ?value-of<BadRequestErrorBodyDetailsLimit> $limit
     */
    #[JsonProperty('limit')]
    public ?string $limit;

    /**
     * @var ?int $maxDepth
     */
    #[JsonProperty('maxDepth')]
    public ?int $maxDepth;

    /**
     * @var ?int $maxReferences
     */
    #[JsonProperty('maxReferences')]
    public ?int $maxReferences;

    /**
     * @var ?array<string> $referenceChain Segment IDs already followed to reach segmentId, outermost first. Does not include the segment being counted.
     */
    #[JsonProperty('referenceChain'), ArrayType(['string'])]
    public ?array $referenceChain;

    /**
     * @var ?string $segmentId Referenced segment that exceeded the limit.
     */
    #[JsonProperty('segmentId')]
    public ?string $segmentId;

    /**
     * @param array{
     *   limit?: ?value-of<BadRequestErrorBodyDetailsLimit>,
     *   maxDepth?: ?int,
     *   maxReferences?: ?int,
     *   referenceChain?: ?array<string>,
     *   segmentId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->maxDepth = $values['maxDepth'] ?? null;
        $this->maxReferences = $values['maxReferences'] ?? null;
        $this->referenceChain = $values['referenceChain'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
