<?php

namespace Sequenzy\Conversations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetInboxAddressResponse extends JsonSerializableType
{
    /**
     * @var ?GetInboxAddressResponseInbox $inbox
     */
    #[JsonProperty('inbox')]
    public ?GetInboxAddressResponseInbox $inbox;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   inbox?: ?GetInboxAddressResponseInbox,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inbox = $values['inbox'] ?? null;
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
