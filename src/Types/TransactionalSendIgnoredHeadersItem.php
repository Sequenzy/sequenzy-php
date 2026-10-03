<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class TransactionalSendIgnoredHeadersItem extends JsonSerializableType
{
    /**
     * @var string $name Header name as sent, or `*` when `headers` was not an object.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<TransactionalSendIgnoredHeadersItemReason> $reason Why the header was not applied.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   name: string,
     *   reason: value-of<TransactionalSendIgnoredHeadersItemReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->reason = $values['reason'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
