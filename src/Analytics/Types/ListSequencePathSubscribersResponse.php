<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListSequencePathSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?string $bucket
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @var ?int $conversionWindowDays
     */
    #[JsonProperty('conversionWindowDays')]
    public ?int $conversionWindowDays;

    /**
     * @var ?string $nodeId
     */
    #[JsonProperty('nodeId')]
    public ?string $nodeId;

    /**
     * @var ?array<string, mixed> $outcome
     */
    #[JsonProperty('outcome'), ArrayType(['string' => 'mixed'])]
    public ?array $outcome;

    /**
     * @var ?array<string, mixed> $pagination
     */
    #[JsonProperty('pagination'), ArrayType(['string' => 'mixed'])]
    public ?array $pagination;

    /**
     * @var ?string $pathId
     */
    #[JsonProperty('pathId')]
    public ?string $pathId;

    /**
     * @var ?string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public ?string $sequenceId;

    /**
     * @var ?array<array<string, mixed>> $subscribers
     */
    #[JsonProperty('subscribers'), ArrayType([['string' => 'mixed']])]
    public ?array $subscribers;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $timedOut
     */
    #[JsonProperty('timedOut')]
    public ?bool $timedOut;

    /**
     * @param array{
     *   bucket?: ?string,
     *   conversionWindowDays?: ?int,
     *   nodeId?: ?string,
     *   outcome?: ?array<string, mixed>,
     *   pagination?: ?array<string, mixed>,
     *   pathId?: ?string,
     *   sequenceId?: ?string,
     *   subscribers?: ?array<array<string, mixed>>,
     *   success?: ?bool,
     *   timedOut?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bucket = $values['bucket'] ?? null;
        $this->conversionWindowDays = $values['conversionWindowDays'] ?? null;
        $this->nodeId = $values['nodeId'] ?? null;
        $this->outcome = $values['outcome'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->pathId = $values['pathId'] ?? null;
        $this->sequenceId = $values['sequenceId'] ?? null;
        $this->subscribers = $values['subscribers'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->timedOut = $values['timedOut'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
