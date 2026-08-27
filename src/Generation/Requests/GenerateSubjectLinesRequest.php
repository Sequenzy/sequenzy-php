<?php

namespace Sequenzy\Generation\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GenerateSubjectLinesRequest extends JsonSerializableType
{
    /**
     * @var ?float $count Number of variants to generate. Defaults to 5.
     */
    #[JsonProperty('count')]
    public ?float $count;

    /**
     * @var string $topic Topic, campaign idea, or context for the subject lines.
     */
    #[JsonProperty('topic')]
    public string $topic;

    /**
     * @param array{
     *   topic: string,
     *   count?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'] ?? null;
        $this->topic = $values['topic'];
    }
}
