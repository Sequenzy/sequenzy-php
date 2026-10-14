<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ReceivingDomainResponse extends JsonSerializableType
{
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
     *   receivingDomain: ReceivingDomain,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
