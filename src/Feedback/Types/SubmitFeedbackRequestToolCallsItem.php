<?php

namespace Sequenzy\Feedback\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SubmitFeedbackRequestToolCallsItem extends JsonSerializableType
{
    /**
     * @var ?string $args Short summary of the arguments used.
     */
    #[JsonProperty('args')]
    public ?string $args;

    /**
     * @var ?string $error Error returned by this call, if any.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var string $tool Tool, command, or endpoint name.
     */
    #[JsonProperty('tool')]
    public string $tool;

    /**
     * @param array{
     *   tool: string,
     *   args?: ?string,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->args = $values['args'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->tool = $values['tool'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
