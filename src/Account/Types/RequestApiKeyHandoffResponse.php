<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RequestApiKeyHandoffResponse extends JsonSerializableType
{
    /**
     * @var RequestApiKeyHandoffResponseHandoff $handoff
     */
    #[JsonProperty('handoff')]
    public RequestApiKeyHandoffResponseHandoff $handoff;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?array<string> $nextSteps
     */
    #[JsonProperty('nextSteps'), ArrayType(['string'])]
    public ?array $nextSteps;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   handoff: RequestApiKeyHandoffResponseHandoff,
     *   success: bool,
     *   message?: ?string,
     *   nextSteps?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->handoff = $values['handoff'];
        $this->message = $values['message'] ?? null;
        $this->nextSteps = $values['nextSteps'] ?? null;
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
