<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateNoteByExternalIdSubscribersRequest extends JsonSerializableType
{
    /**
     * @var string $externalId External ID. Query form supports IDs containing slashes.
     */
    public string $externalId;

    /**
     * @var string $body Internal note body.
     */
    #[JsonProperty('body')]
    public string $body;

    /**
     * @param array{
     *   externalId: string,
     *   body: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->body = $values['body'];
    }
}
