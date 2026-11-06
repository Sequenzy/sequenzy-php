<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceDefinition;

class PushDefinitionSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?bool $confirmLiveChange Required when the change affects an active sequence.
     */
    public ?bool $confirmLiveChange;

    /**
     * @var ?bool $dryRun Return the changes without saving them.
     */
    public ?bool $dryRun;

    /**
     * @var SequenceDefinition $body
     */
    public SequenceDefinition $body;

    /**
     * @param array{
     *   body: SequenceDefinition,
     *   confirmLiveChange?: ?bool,
     *   dryRun?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->confirmLiveChange = $values['confirmLiveChange'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->body = $values['body'];
    }
}
