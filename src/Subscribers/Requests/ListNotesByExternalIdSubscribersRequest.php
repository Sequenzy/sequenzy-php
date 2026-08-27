<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListNotesByExternalIdSubscribersRequest extends JsonSerializableType
{
    /**
     * @var string $externalId External ID. Query form supports IDs containing slashes.
     */
    public string $externalId;

    /**
     * @param array{
     *   externalId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
    }
}
