<?php

namespace Sequenzy\Templates\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\RenderEmailRequest;

class RenderTemplatesRequest extends JsonSerializableType
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
