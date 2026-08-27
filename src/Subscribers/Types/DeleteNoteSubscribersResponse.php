<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class DeleteNoteSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?bool $deleted
     */
    #[JsonProperty('deleted')]
    public ?bool $deleted;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   deleted?: ?bool,
     *   id?: ?string,
     *   subscriberId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deleted = $values['deleted'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
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
