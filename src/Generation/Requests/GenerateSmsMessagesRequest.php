<?php

namespace Sequenzy\Generation\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GenerateSmsMessagesRequest extends JsonSerializableType
{
    /**
     * @var ?float $count Number of variants to generate. Defaults to 3.
     */
    #[JsonProperty('count')]
    public ?float $count;

    /**
     * @var string $prompt Description of the SMS to generate.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @param array{
     *   prompt: string,
     *   count?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->count = $values['count'] ?? null;
        $this->prompt = $values['prompt'];
    }
}
