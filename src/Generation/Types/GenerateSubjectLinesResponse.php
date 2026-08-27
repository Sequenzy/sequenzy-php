<?php

namespace Sequenzy\Generation\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GenerateSubjectLinesResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $subjects
     */
    #[JsonProperty('subjects'), ArrayType(['string'])]
    public ?array $subjects;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $topic
     */
    #[JsonProperty('topic')]
    public ?string $topic;

    /**
     * @param array{
     *   subjects?: ?array<string>,
     *   success?: ?bool,
     *   topic?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subjects = $values['subjects'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->topic = $values['topic'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
