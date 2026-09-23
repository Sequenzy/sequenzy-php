<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceAudience;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

class EnrollAudienceSequencesRequest extends JsonSerializableType
{
    /**
     * @var SequenceAudience $audience
     */
    #[JsonProperty('audience')]
    public SequenceAudience $audience;

    /**
     * @var ?array<string, mixed> $data Run-level data shared by everyone in this run (a sale end time, a discount percentage, a cut-off time). Stored on the run and copied into every enrolled contact's sequence context at enrollment time; the sequence's emails and conditions read it as `{{enrollment.<field>}}` (nested paths like `{{enrollment.draw.date}}` work). Must be a JSON object of at most 8 KB, 100 top-level keys and 8 levels of nesting; keys named __proto__, constructor or prototype and strings containing NUL characters are rejected. Omit, null or {} for none. Auto-enroll syncs do not carry run data.
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @var ?DateTime $scheduledFor Start the run at this moment instead of now (up to one year ahead). The run is created queued with a delayed job and can be cancelled before it starts. A past value starts now.
     */
    #[JsonProperty('scheduledFor'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledFor;

    /**
     * @var ?string $targetNodeId Step to start contacts at. Defaults to the first step after the trigger. Cannot be a trigger node.
     */
    #[JsonProperty('targetNodeId')]
    public ?string $targetNodeId;

    /**
     * @param array{
     *   audience: SequenceAudience,
     *   data?: ?array<string, mixed>,
     *   scheduledFor?: ?DateTime,
     *   targetNodeId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'];
        $this->data = $values['data'] ?? null;
        $this->scheduledFor = $values['scheduledFor'] ?? null;
        $this->targetNodeId = $values['targetNodeId'] ?? null;
    }
}
