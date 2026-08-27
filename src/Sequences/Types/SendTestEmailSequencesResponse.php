<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SendTestEmailSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var string $nodeId
     */
    #[JsonProperty('nodeId')]
    public string $nodeId;

    /**
     * @var array<SendTestEmailSequencesResponseResultsItem> $results
     */
    #[JsonProperty('results'), ArrayType([SendTestEmailSequencesResponseResultsItem::class])]
    public array $results;

    /**
     * @var string $sequenceId
     */
    #[JsonProperty('sequenceId')]
    public string $sequenceId;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   nodeId: string,
     *   results: array<SendTestEmailSequencesResponseResultsItem>,
     *   sequenceId: string,
     *   success: bool,
     *   message?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'] ?? null;
        $this->nodeId = $values['nodeId'];
        $this->results = $values['results'];
        $this->sequenceId = $values['sequenceId'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
