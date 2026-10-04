<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\CheckEmailRequest;

class CheckStepSequencesRequest extends JsonSerializableType
{
    /**
     * @var CheckEmailRequest $body
     */
    public CheckEmailRequest $body;

    /**
     * @param array{
     *   body: CheckEmailRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
