<?php

namespace Sequenzy\Lists\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class RemoveSubscribersListsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $emails Email addresses to remove. Combined with subscriberIds, up to 500 per request.
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public ?array $emails;

    /**
     * @var ?array<string> $subscriberIds Subscriber IDs to remove. Combined with emails, up to 500 per request.
     */
    #[JsonProperty('subscriberIds'), ArrayType(['string'])]
    public ?array $subscriberIds;

    /**
     * @param array{
     *   emails?: ?array<string>,
     *   subscriberIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->subscriberIds = $values['subscriberIds'] ?? null;
    }
}
