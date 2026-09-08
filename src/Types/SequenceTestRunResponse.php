<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceTestRunResponse extends JsonSerializableType
{
    /**
     * @var SequenceTestRunResponseRun $run
     */
    #[JsonProperty('run')]
    public SequenceTestRunResponseRun $run;

    /**
     * @param array{
     *   run: SequenceTestRunResponseRun,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->run = $values['run'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
