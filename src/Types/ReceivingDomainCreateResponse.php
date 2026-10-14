<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ReceivingDomainCreateResponse extends JsonSerializableType
{
    /**
     * @var bool $created True when the domain was added; false when this workspace already had it.
     */
    #[JsonProperty('created')]
    public bool $created;

    /**
     * @var ReceivingDomain $receivingDomain
     */
    #[JsonProperty('receivingDomain')]
    public ReceivingDomain $receivingDomain;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   created: bool,
     *   receivingDomain: ReceivingDomain,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->created = $values['created'];
        $this->receivingDomain = $values['receivingDomain'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
