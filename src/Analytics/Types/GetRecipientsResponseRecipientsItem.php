<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetRecipientsResponseRecipientsItem extends JsonSerializableType
{
    /**
     * @var ?array<GetRecipientsResponseRecipientsItemClickedItem> $clicked
     */
    #[JsonProperty('clicked'), ArrayType([GetRecipientsResponseRecipientsItemClickedItem::class])]
    public ?array $clicked;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?array<GetRecipientsResponseRecipientsItemOpenedItem> $opened
     */
    #[JsonProperty('opened'), ArrayType([GetRecipientsResponseRecipientsItemOpenedItem::class])]
    public ?array $opened;

    /**
     * @var ?bool $unsubscribed
     */
    #[JsonProperty('unsubscribed')]
    public ?bool $unsubscribed;

    /**
     * @param array{
     *   clicked?: ?array<GetRecipientsResponseRecipientsItemClickedItem>,
     *   email?: ?string,
     *   opened?: ?array<GetRecipientsResponseRecipientsItemOpenedItem>,
     *   unsubscribed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->clicked = $values['clicked'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->opened = $values['opened'] ?? null;
        $this->unsubscribed = $values['unsubscribed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
