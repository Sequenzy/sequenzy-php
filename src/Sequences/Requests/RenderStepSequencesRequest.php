<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\RenderEmailRequest;

class RenderStepSequencesRequest extends JsonSerializableType
{
    /**
     * @var RenderEmailRequest $body
     */
    public RenderEmailRequest $body;

    /**
     * @param array{
     *   body: RenderEmailRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
