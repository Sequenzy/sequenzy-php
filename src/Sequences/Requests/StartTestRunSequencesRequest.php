<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class StartTestRunSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customVariables Trigger event properties available as event.* in sequence actions. Supports nested objects and arrays. Omit or use an empty object for no event properties. Null is invalid. No event is recorded and subscriber attributes are not changed by supplying this object.
     */
    #[JsonProperty('customVariables'), ArrayType(['string' => 'mixed'])]
    public ?array $customVariables;

    /**
     * @var ?int $speedMultiplier Delay acceleration. Existing live-test wait caps still apply.
     */
    #[JsonProperty('speedMultiplier')]
    public ?int $speedMultiplier;

    /**
     * @var string $subscriberId Active subscriber in the same company with an email address.
     */
    #[JsonProperty('subscriberId')]
    public string $subscriberId;

    /**
     * @param array{
     *   subscriberId: string,
     *   customVariables?: ?array<string, mixed>,
     *   speedMultiplier?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customVariables = $values['customVariables'] ?? null;
        $this->speedMultiplier = $values['speedMultiplier'] ?? null;
        $this->subscriberId = $values['subscriberId'];
    }
}
