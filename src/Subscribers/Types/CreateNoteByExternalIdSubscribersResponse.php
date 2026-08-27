<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\SubscriberNote;
use Sequenzy\Core\Json\JsonProperty;

class CreateNoteByExternalIdSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?SubscriberNote $note
     */
    #[JsonProperty('note')]
    public ?SubscriberNote $note;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   note?: ?SubscriberNote,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->note = $values['note'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
