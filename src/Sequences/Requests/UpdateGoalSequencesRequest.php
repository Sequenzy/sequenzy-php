<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SequenceGoalInput;

class UpdateGoalSequencesRequest extends JsonSerializableType
{
    /**
     * @var SequenceGoalInput $body
     */
    public SequenceGoalInput $body;

    /**
     * @param array{
     *   body: SequenceGoalInput,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
