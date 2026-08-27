<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateNoteSubscribersRequest extends JsonSerializableType
{
    /**
     * @var string $body Internal note body.
     */
    #[JsonProperty('body')]
    public string $body;

    /**
     * @param array{
     *   body: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
